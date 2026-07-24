FROM php:8.4.17-apache

RUN a2enmod headers rewrite

WORKDIR /var/www/html

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php-security.ini /usr/local/etc/php/conf.d/zz-security.ini
COPY . /var/www/html
COPY docker/entrypoint.sh /usr/local/bin/metallife-entrypoint

RUN chmod 0755 /usr/local/bin/metallife-entrypoint \
    && mkdir -p /var/www/html/storage/uploads \
    && chown -R www-data:www-data /var/www/html/storage

ENTRYPOINT ["/usr/local/bin/metallife-entrypoint"]
CMD ["apache2-foreground"]
