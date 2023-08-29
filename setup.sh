docker_user=$(id -u "${USER}"):$(id -g "${USER}");
web_app=$(realpath ./webApp)

docker run --rm --interactive --tty -v "$web_app":/app -u "$docker_user" composer:2.5 install --dev;

cd "$web_app";

cp .env.example .env;
./vendor/bin/sail up -d;
./vendor/bin/sail artisan key:generate;
./vendor/bin/sail npm install;
./vendor/bin/sail stop;