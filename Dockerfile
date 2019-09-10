FROM composer:latest AS composer
WORKDIR /code
COPY composer.json composer.lock symfony.lock ./
RUN composer install --prefer-dist --no-scripts --no-progress --no-suggest --no-interaction --ignore-platform-reqs


FROM php:7-fpm AS fpm
WORKDIR /code
COPY ./ ./
COPY --from=composer /code/vendor /code/vendor

RUN bin/console assets:install
RUN bin/console cache:warmup

ARG APP_ENV=prod
ENV APP_ENV $APP_ENV
ARG APP_DEBUG=0
ENV APP_DEBUG $APP_DEBUG