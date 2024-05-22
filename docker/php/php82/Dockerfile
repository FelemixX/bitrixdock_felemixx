FROM phpdockerio/php:8.2-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.2-gd \
    php8.2-imagick \
    php8.2-intl \
    php8.2-interbase \
    php8.2-mbstring \
    php8.2-mcrypt \
    php8.2-memcache \
    php8.2-memcached \
    php8.2-mysql \
    php8.2-opcache \
    php8.2-soap \
    php8.2-xdebug \
    php8.2-zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Sendmail
RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    rm -rf /var/lib/apt/lists/*
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

COPY ./php.ini /etc/php/8.2/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/8.2/cli/conf.d/90-php.ini

#remove comments if browscap needed
#COPY ./your_browscap.ini /etc/php/8.2/fpm/conf.d/browscap.ini
#COPY ./your_browscap.ini /etc/php/8.2/cli/conf.d/browscap.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
