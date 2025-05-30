FROM php:8.4.5-fpm-alpine3.21

#RUN addgroup -g ${PGID} ut && adduser -u ${PUID} -G ut -s /bin/sh -D ut

#RUN sed -i "s/user = www-data/user = ${PUID}/g" /usr/local/etc/php-fpm.d/www.conf
#RUN sed -i "s/group = www-data/group = ${PGID}/g" /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install pdo pdo_mysql

#RUN chown -R ut:ut /var/www/html && chmod -R 775 /var/www/html

WORKDIR /var/www/html

#USER ut

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]