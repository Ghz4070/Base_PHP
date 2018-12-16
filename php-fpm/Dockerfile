FROM php:7.2-fpm

LABEL maintainer="Ghezal Ilies"

COPY ./conf.d /usr/local/etc/php/conf.d

#Automatise les extensions apt-get update
RUN docker-php-ext-install pdo pdo_mysql 