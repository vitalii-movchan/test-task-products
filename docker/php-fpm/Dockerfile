# https://hub.docker.com/_/php
FROM php:8.3-fpm-alpine
# uname -m

# Get any build argument overrides
ARG USER_ID
ARG USER_NAME
ARG GROUP_ID
ARG GROUP_NAME

# Xdebug
ARG XDEBUG_VERSION
ARG XDEBUG_CLIENT_PORT
ARG XDEBUG_IDE_KEY

# Make container user
RUN addgroup --system --gid ${GROUP_ID} ${GROUP_NAME}
RUN adduser --system --shell /bin/sh --uid ${USER_ID} --ingroup ${GROUP_NAME} --disabled-password ${USER_NAME}

# Make php-fpm:alpline user
RUN sed -i "s/user = www-data/user = ${USER_NAME}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${GROUP_NAME}/g" /usr/local/etc/php-fpm.d/www.conf

# install dependecies
RUN apk --update add \
    autoconf \
    build-base \
    linux-headers

# Install PHP extensions
RUN yes | pecl install xdebug-${XDEBUG_VERSION} && docker-php-ext-enable xdebug
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql

# Configure xdebug
RUN echo "xdebug.mode=debug,coverage,develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log_level=3" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=${XDEBUG_CLIENT_PORT:-9000}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/www/custom-products/logs/xdebug-fpm.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = ${XDEBUG_IDE_KEY}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/creedo-products

EXPOSE 9000

USER ${USER_NAME}