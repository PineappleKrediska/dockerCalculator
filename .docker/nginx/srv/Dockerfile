FROM nginx:1.19-alpine

ENV TZ=Europe/Moscow
RUN apk add tzdata && cp /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf.d /etc/nginx/conf.d
RUN mkdir -p /var/www/calculator/public \
    && chmod 0777 /var/www/calculator/public