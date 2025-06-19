FROM composer

#RUN addgroup -g ${PGID} ut && adduser -u ${PUID} -G ut -s /bin/sh -D ut

WORKDIR /var/www/html

#USER ut
