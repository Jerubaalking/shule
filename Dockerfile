FROM php:8.0-apache
# RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' > /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_DSN ${MYSQL_DSN}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
RUN docker-php-ext-install pdo_mysql
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y git curl
RUN mkdir -p /var/www/html
COPY ["composer.json", "composer-lock.json*","./"]
COPY . /var/www/html/
WORKDIR /var/www/html
RUN composer install --no-dev
CMD [ "php", "-S", "[::]:3080", "-t", "/" ]
EXPOSE 3080