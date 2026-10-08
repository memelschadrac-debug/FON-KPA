FROM php:8.2-fpm

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer les extensions PHP nécessaires à Laravel
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Répertoire de travail Laravel
WORKDIR /var/www/html

# Copier les fichiers Composer en premier
# Cela permet à Docker de réutiliser son cache
# si le code PHP change mais pas les dépendances.
COPY composer.json composer.lock ./

# Installer les dépendances PHP
RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# Copier ensuite le reste du projet
COPY . .

# Créer les répertoires nécessaires à Laravel
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/testing \
    storage/logs

# Donner les droits à PHP-FPM
RUN chown -R www-data:www-data storage bootstrap/cache