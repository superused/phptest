FROM php:8.0-apache
RUN apt-get update
RUN apt-get install -y vim wget zlib1g-dev libzip-dev gnupg unzip
RUN docker-php-ext-install zip pdo_mysql
RUN a2enmod rewrite
COPY mailhog.ini /usr/local/etc/php/conf.d/mailhog.ini
RUN curl -sSL https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 -o mhsendmail \
    && chmod +x mhsendmail \
    && mv mhsendmail /usr/local/bin/mhsendmail

# Composer Install
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN composer global require "laravel/installer"

# node.js install
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
