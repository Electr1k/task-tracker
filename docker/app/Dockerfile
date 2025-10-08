FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev

RUN docker-php-ext-install pdo pdo_mysql zip mbstring exif

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
ADD ../../src /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage
