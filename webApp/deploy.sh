docker compose -f docker-compose-server.yml exec webapp npm run build;
docker compose -f docker-compose-server.yml exec webapp php artisan migrate;
