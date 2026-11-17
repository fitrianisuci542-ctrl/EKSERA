# ---------------------------------------------------------------------------
# Stage 1 - build asset Vite (CSS/JS)
# ---------------------------------------------------------------------------
FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund

COPY vite.config.js ./
COPY resources ./resources

RUN npm run build


# ---------------------------------------------------------------------------
# Stage 2 - runtime Laravel + Apache
# ---------------------------------------------------------------------------
FROM php:8.4-apache

WORKDIR /var/www/html

# Ekstensi PHP yang dibutuhkan Laravel + PostgreSQL
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev \
        libicu-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install -j"$(nproc)" pdo_pgsql intl zip opcache \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-eksera.ini
COPY docker/apache.conf /etc/apache2/conf-available/zz-eksera.conf

RUN a2enconf zz-eksera \
    && sed -ri 's#^([[:space:]]*DocumentRoot[[:space:]]+).*#\1/var/www/html/public#' \
        /etc/apache2/sites-available/000-default.conf

# Layer dependency Composer dipisah agar cache build lebih efektif
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-interaction \
        --prefer-dist \
        --no-scripts \
        --no-autoloader

COPY . .
COPY --from=assets /app/public/build ./public/build

RUN composer dump-autoload --no-dev --optimize --no-scripts \
    && php artisan package:discover --ansi \
    && mkdir -p \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 10000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
