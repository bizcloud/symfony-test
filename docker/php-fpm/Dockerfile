FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git curl wget unzip \
    && rm -rf /var/lib/apt/lists/*

# Set TIMEZONE
RUN rm /etc/localtime \
    && ln -s /usr/share/zoneinfo/Europe/Moscow /etc/localtime \
    && "date"

# Install OPCACHE extension
RUN docker-php-ext-install opcache

# Install INTL extension
RUN apt-get update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && rm -rf /var/lib/apt/lists/*

# Install APCU extension
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Install PDO MYSQL extension
RUN docker-php-ext-install pdo_mysql

# Install PGSQL extension
RUN apt-get update

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install ZIP extension
RUN apt-get update \
    && apt-get install -y libzip-dev zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Install dom extension
RUN apt-get update -y && apt-get upgrade -y;
RUN apt-get install -y libxml2-dev
RUN docker-php-ext-install -j$(nproc) xmlrpc


# Install COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Symfony-CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash

# Install PCOV extension
RUN pecl install pcov \
    && docker-php-ext-enable pcov

## Install XDEBUG extension
RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug

# Set PROJECT USER
RUN useradd -ms /bin/bash symfony
USER symfony
WORKDIR /var/www/symfony-test/

COPY conf/php-fpm.conf /etc/php-fpm.conf
COPY conf/php.ini /usr/local/etc/php/conf.d/100-php.ini