FROM php:7.4.22-fpm-alpine

ENV COMPOSER_HOME /.composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

