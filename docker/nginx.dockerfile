FROM nginx:1.26.3-alpine

#RUN addgroup -g ${PGID} ut && adduser -u ${PUID} -G ut -s /bin/sh -D ut

#COPY --chown=ut:ut nginx/default.conf /etc/nginx/conf.d/default.conf
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

#RUN sed -i "s/user  nginx/user ${PUID}/g" /etc/nginx/nginx.conf

WORKDIR /var/www/html/public

#USER ut