#!/bin/sh
mkdir -p /var/www/html/wp-content/uploads
mkdir -p /var/www/html/wp-content/upgrade
chown -R www-data:www-data /var/www/html/wp-content
exec "$@"