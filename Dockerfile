# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/

# Base Image ...................................................................

ARG with_xdebug=nodebug

FROM serversideup/php:8.3-fpm-nginx AS base

## Uncomment if you need to install additional PHP extensions

# USER root
# RUN install-php-extensions gd imagick

## XDEBUG ......................................................................
FROM base AS base-xdebug
RUN echo "Build will use XDEBUG"
RUN install-php-extensions xdebug
ENV PHP_INI_DIR=/usr/local/etc/php
ADD https://raw.githubusercontent.com/docker-library/php/master/docker-php-ext-enable /usr/bin/docker-php-ext-enable
RUN chmod u+x /usr/bin/docker-php-ext-enable
RUN docker-php-ext-enable xdebug
COPY .infrastructure/conf/php/docker-php-ext-xdebug.ini  ${PHP_INI_DIR}/conf.d/
EXPOSE 9003

## NO-XDEBUG ...................................................................
FROM base AS base-nodebug
RUN echo "Build will NOT use XDEBUG"

## DEVELOPMENT .................................................................
FROM base-${with_xdebug} AS development

ARG USER_ID
ARG GROUP_ID

USER root
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID  && \
  docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

USER www-data

# Base Frontend Image ..........................................................
FROM node:20-slim AS frontend
WORKDIR /platform/application/resources/web
RUN npm install -g pnpm
COPY application/resources/web/package.json ./
COPY application/resources/web/pnpm-lock.yaml ./
RUN pnpm install
COPY . .

# Ensure PHP-FPM gracefully stops
STOPSIGNAL SIGQUIT
USER www-data
