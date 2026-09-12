FROM php:8.5-fpm

RUN docker-php-ext-install mysqli

WORKDIR /var/www/html

COPY backend/my /var/www/html
