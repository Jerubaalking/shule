# Dockerfile
FROM php:7.1.1-alpine
# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN apk update && apk add --no-cache git curl
RUN mkdir -p /usr/local/bin/ && php installer.php --install-dir=/usr/local/bin --filename=composer
RUN mkdir -p /var/www/html
COPY ./src/ /var/www/html/
RUN composer install -d /var/www/html/
CMD [ "php", "-S", "[::]:3080", "-t", "/var/www/html" ]
EXPOSE 3080