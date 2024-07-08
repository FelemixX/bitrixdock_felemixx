FROM phpdockerio/php:7.4-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php7.4-gd \
    php7.4-imagick \
    php7.4-intl \
    php7.4-interbase \
    php7.4-mbstring \
    php7.4-mcrypt \
    php7.4-memcache \
    php7.4-memcached \
    php7.4-mysql \
    php7.4-opcache \
    php7.4-soap \
    php7.4-xdebug \
    php7.4-zip \
    php7.4-dev \
    curl \
    git \
    libtool \
    autoconf \
    build-essential \
    golang-go \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Xhprof
RUN git clone https://github.com/FelemixX/xhprof.git ./xhprof \
    && cd ./xhprof/extension \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && echo "extension=xhprof.so" > /etc/php/8.2/mods-available/xhprof.ini \
    && ln -s /etc/php/8.2/mods-available/xhprof.ini /etc/php/8.2/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.2/mods-available/xhprof.ini /etc/php/8.2/cli/conf.d/20-xhprof.ini

# Sendmail
RUN go install github.com/mailhog/MailHog@latest

COPY ./php.ini /etc/php/7.4/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/7.4/cli/conf.d/90-php.ini

#remove comments if browscap needed
#COPY ./your_browscap.ini /etc/php/7.4/fpm/conf.d/browscap.ini
#COPY ./your_browscap.ini /etc/php/7.4/cli/conf.d/browscap.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
