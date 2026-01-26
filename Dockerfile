FROM php:8.2-apache

RUN a2enmod rewrite

COPY . /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

RUN sed -i 's|AllowOverride None|AllowOverride All|g' \
    /etc/apache2/apache2.conf
