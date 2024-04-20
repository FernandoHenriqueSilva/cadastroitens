FROM php:8.2-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html/
WORKDIR /var/www/html
EXPOSE 3031

CMD ["apache2-foreground"]