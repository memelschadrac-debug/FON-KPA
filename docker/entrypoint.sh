#!/bin/sh
set -eu

: "${PORT:=8080}"
export PORT

cd /var/www/html

mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    storage/app/public

# CrÃ©er le lien public de stockage dans le conteneur Linux
if [ ! -L public/storage ]; then
    if [ -e public/storage ]; then
        echo "Erreur : public/storage existe mais n'est pas un lien symbolique." >&2
        exit 1
    fi

    php artisan storage:link
fi

envsubst '${PORT}' \
    < /etc/nginx/templates/production.conf.template \
    > /etc/nginx/conf.d/default.conf

php-fpm -D

exec nginx -g 'daemon off;'
