FROM php:8.2-apache
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN apt-get -y update && apt-get -y install git && apt-get -y install zip


