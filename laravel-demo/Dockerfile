FROM php:8.2-cli-alpine AS build

RUN apk add --no-cache \
    curl \
    freetype-dev \
    git \
    libjpeg-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    oniguruma-dev \
    unzip \
    zip \
    $PHPIZE_DEPS \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .
RUN mkdir -p bootstrap/cache storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs \
    && cp .env.example .env \
    && composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist \
    && php artisan key:generate --force \
    && chown -R www-data:www-data storage bootstrap/cache

FROM php:8.2-fpm-alpine AS runtime

RUN apk add --no-cache freetype libjpeg-turbo libpng libxml2 libzip oniguruma
COPY --from=build /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=build /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=build --chown=www-data:www-data /var/www /var/www

WORKDIR /var/www
EXPOSE 9000
CMD ["php-fpm"]
