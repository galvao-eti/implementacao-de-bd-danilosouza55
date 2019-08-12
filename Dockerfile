FROM php:7.3-fpm-alpine

RUN apk update && apk add --no-cache \
    git \
    curl \
    mc \
    zip \
    libzip-dev \
    unzip \
    postgresql-dev \
    icu-dev \
    libxml2-dev \
    freetype \
    freetype-dev \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev g++ make autoconf

RUN docker-php-source extract
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-source delete
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_pgsql intl zip
RUN rm -rf /tmp/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
