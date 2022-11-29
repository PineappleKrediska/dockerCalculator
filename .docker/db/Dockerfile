FROM postgres:12.3-alpine

ENV TZ=Europe/Moscow \
    LANG=ru_Ru.UTF-8 \
    LANGUAGE=ru_Ru.UTF-8 \
    LC_CTYPE=ru_Ru.UTF-8 \
    LC_ALL=ru_Ru.UTF-8

RUN apk add --update tzdata && cp /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
