docker run --rm --interactive --tty -v $(realpath ./webApp):/app -u $(id -u ${USER}):$(id -g ${USER}) composer:2.5 install --dev
docker run --rm --interactive --tty -v $(realpath ./webApp):/var/www/html -u $(id -u ${USER}):$(id -g ${USER}) --entrypoint "/bin/bash" php:8.2 -c "cd /var/www/html && cp .env.example .env && php artisan key:generate"
