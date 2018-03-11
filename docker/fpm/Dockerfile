FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libmcrypt-dev \
    libmemcached-dev \
    libssl-dev \
    zlib1g-dev \
    libicu-dev \
    libjpeg-dev \
    libpng-dev \
    && docker-php-ext-install \
        iconv \
        mbstring \
        mysqli \
        pgsql \
        pdo_mysql \
        zip \
        gd

RUN pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug