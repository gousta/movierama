#!/bin/bash

git reset --hard
git fetch --prune
git checkout master
git pull origin master
docker-compose exec movierama_php composer install --optimize-autoloader --no-dev
docker-compose exec movierama_php php artisan route:cache
docker-compose exec movierama_php php artisan config:cache
docker-compose exec movierama_php php artisan view:clear
docker-compose exec movierama_php php artisan migrate --force
