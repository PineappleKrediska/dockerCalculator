FROM php:8.1-fpm-alpine

ARG UID=1001
ARG GID=1001

ENV TZ=Europe/Moscow \
    LANG=en_US.UTF-8 \
    LANGUAGE=en_US.UTF-8 \
    LC_CTYPE=en_US.UTF-8 \
    LC_ALL=en_US.UTF-8


RUN apk add --update --no-cache \
    curl \
    bash \
    libpq \
    libxml2-dev \
    libzip \
    libzip-dev \
    tzdata \
    shadow \
    && apk add $PHPIZE_DEPS \
        postgresql-dev \
        && set -xe \
        && docker-php-ext-install soap opcache sockets pdo_pgsql zip \
        && cp /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
        && usermod -u $UID www-data -s /bin/bash && groupmod -g $GID www-data \
        && apk del $PHPIZE_DEPS postgresql-dev libzip-dev

RUN curl -sLO https://github.com/gordalina/cachetool/releases/latest/download/cachetool.phar \
    && mv cachetool.phar /usr/local/bin/cachetool \
    && chmod +x /usr/local/bin/cachetool


COPY ./conf/php-8.1.ini /usr/local/etc/php/php.ini
COPY ./conf/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

USER www-data
WORKDIR /var/www/calculator