
# Étape 1 : compiler les ressources frontend
FROM node:22-alpine AS frontend

WORKDIR /var/www/html

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build


# Étape 2 : construire l'application Laravel
FROM php:8.2-fpm AS production

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        nginx \
        gettext-base \
        libzip-dev \
        libonig-dev \
    && docker-php-ext-install pdo_mysql zip mbstring \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

COPY --from=frontend /var/www/html/public/build ./public/build

COPY docker/nginx/production.conf.template \
    /etc/nginx/templates/production.conf.template

COPY docker/entrypoint.sh /usr/local/bin/fon-kpa-entrypoint

RUN chmod +x /usr/local/bin/fon-kpa-entrypoint \
    && rm -f /etc/nginx/sites-enabled/default \
    && mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/framework/testing \
        storage/app/public \
        storage/logs \
        bootstrap/cache \
    && rm -f bootstrap/cache/*.php \
    && composer dump-autoload --no-dev --optimize --no-scripts \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr

EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/fon-kpa-entrypoint"]
