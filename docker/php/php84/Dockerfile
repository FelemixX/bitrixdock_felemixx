FROM phpdockerio/php:8.4-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.4-gd \
    php8.4-imagick \
    php8.4-intl \
    php8.4-interbase \
    php8.4-mbstring \
    php8.4-mcrypt \
    php8.4-memcache \
    php8.4-memcached \
    php8.4-redis \
    php8.4-mysql \
    php8.4-opcache \
    php8.4-soap \
    php8.4-xdebug \
    php8.4-zip \
    php8.4-dev \
    curl \
    git \
    libtool \
    autoconf \
    build-essential \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Xhprof
RUN git clone https://github.com/FelemixX/xhprof.git ./xhprof \
    && cd ./xhprof/extension \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && echo "extension=xhprof.so" > /etc/php/8.4/mods-available/xhprof.ini \
    && ln -s /etc/php/8.4/mods-available/xhprof.ini /etc/php/8.4/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.4/mods-available/xhprof.ini /etc/php/8.4/cli/conf.d/20-xhprof.ini

# Sendmail
RUN git clone https://github.com/FelemixX/mailpit.git ./mailpit \
    && cd ./mailpit \
    && chmod +x ./install.sh \
    && ./install.sh \
    && ln -s /usr/local/bin/mailpit /usr/sbin/sendmail \
    && rm -rf mailpit/


#COPY ./php.ini /etc/php/8.4/fpm/conf.d/90-php.ini
#COPY ./php.ini /etc/php/8.4/cli/conf.d/90-php.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
