FROM composer:2.2.25

ENV COMPOSER_GROUP=gio
ENV COMPOSER_USER=gio
RUN adduser -g ${COMPOSER_GROUP} -s /bin/sh -D ${COMPOSER_USER}

WORKDIR /var/www/html