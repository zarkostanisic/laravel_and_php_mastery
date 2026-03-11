FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    supervisor

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl

RUN docker-php-ext-enable opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
