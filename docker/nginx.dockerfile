FROM nginx:1.26.3-alpine

ENV NGINX_USER=gio
ENV NGINX_GROUP=gio
RUN adduser -g ${NGINX_GROUP} -s /bin/sh -D ${NGINX_USER}

COPY --chown=gio:gio nginx/default.conf /etc/nginx/conf.d/default.conf

RUN sed -i "s/user  nginx/user ${NGINX_USER}/g" /etc/nginx/nginx.conf

WORKDIR /var/www/html/public