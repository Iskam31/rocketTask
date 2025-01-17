#!/bin/sh
mkdir -p /var/www/html/wp-content/uploads
mkdir -p /var/www/html/wp-content/upgrade
chown -R www-data:www-data /var/www/html/wp-content
exec "$@"

cd /var/www/html/wp-content/themes
docker-compose down
docker-compose build --no-cache
echo "Пересборка контейнеров"
docker-compose up -d
echo "Пересборка контейнеров успешна"