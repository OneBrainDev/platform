# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/

# Base Image ...................................................................

FROM serversideup/php:8.3-fpm-nginx AS base

## Uncomment if you need to install additional PHP extensions

# USER root
# RUN install-php-extensions bcmath gd

## XDEBUG ......................................................................
# RUN install-php-extensions xdebug
# ENV PHP_INI_DIR=/usr/local/etc/php
# ADD https://raw.githubusercontent.com/docker-library/php/master/docker-php-ext-enable /usr/bin/docker-php-ext-enable
# RUN chmod u+x /usr/bin/docker-php-ext-enable
# RUN docker-php-ext-enable xdebug
# COPY .infrastructure/conf/xdebug/docker-php-ext-xdebug.ini  ${PHP_INI_DIR}/conf.d/
# EXPOSE 9003

# Development Image ............................................................
FROM base AS development

# We can pass USER_ID and GROUP_ID as build arguments
# to ensure the www-data user has the same UID and GID
# as the user running Docker.
ARG USER_ID
ARG GROUP_ID

# Switch to root so we can set the user ID and group ID
USER root
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID  && \
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx
USER www-data

# CI image .....................................................................
FROM base AS ci

# Sometimes CI images need to run as root
# so we set the ROOT user and configure
# the PHP-FPM pool to run as www-data
USER root
RUN echo "user = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf && \
    echo "group = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf

# Production Image .............................................................
FROM base AS deploy
COPY --chown=www-data:www-data . /var/www/html
USER www-data

# Base Frontend Image ..........................................................
USER www-data

FROM node:20-slim AS frontend-base
ENV PNPM_HOME="/pnpm"
ENV PATH="$PNPM_HOME:$PATH"
RUN corepack enable
