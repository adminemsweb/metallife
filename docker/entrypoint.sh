#!/bin/sh
set -eu

mkdir -p /var/www/html/storage/uploads
chown -R www-data:www-data /var/www/html/storage

exec "$@"
