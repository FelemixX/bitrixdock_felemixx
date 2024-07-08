FROM phpdockerio/php:8.3-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.3-dev \
    php8.3-gd \
    php8.3-imagick \
    php8.3-intl \
    php8.3-interbase \
    php8.3-mbstring \
    php8.3-mcrypt \
    php8.3-memcache \
    php8.3-memcached \
    php8.3-mysql \
    php8.3-opcache \
    php8.3-soap \
    php8.3-xdebug \
    php8.3-zip \
    php8.3-dev \
    curl \
    git \
    libtool \
    autoconf \
    build-essential \
    golang-go \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Xhprof
RUN git clone https://github.com/FelemixX/xhprof.git ./xhprof \
    && cd ./xhprof/extension \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && echo "extension=xhprof.so" > /etc/php/8.3/mods-available/xhprof.ini \
    && ln -s /etc/php/8.3/mods-available/xhprof.ini /etc/php/8.3/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.3/mods-available/xhprof.ini /etc/php/8.3/cli/conf.d/20-xhprof.ini

# Sendmail
RUN git clone https://github.com/axllent/mailpit.git ./mailpit \
    && cd ./mailpit \
    && chmod +x ./install.sh \
    && ./install.sh \
    && ln -s /usr/local/bin/mailpit /usr/sbin/sendmail \
    && rm -rf mailpit/


#COPY ./php.ini /etc/php/8.3/fpm/conf.d/90-php.ini
#COPY ./php.ini /etc/php/8.3/cli/conf.d/90-php.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
