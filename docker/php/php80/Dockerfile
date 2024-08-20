FROM phpdockerio/php:8.0-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.0-gd \
    php8.0-imagick \
    php8.0-intl \
    php8.0-interbase \
    php8.0-mbstring \
    php8.0-mcrypt \
    php8.0-memcache \
    php8.0-memcached \
    php8.0-redis \
    php8.0-mysql \
    php8.0-opcache \
    php8.0-soap \
    php8.0-xdebug \
    php8.0-zip \
    php8.0-dev \
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
    && echo "extension=xhprof.so" > /etc/php/8.0/mods-available/xhprof.ini \
    && ln -s /etc/php/8.0/mods-available/xhprof.ini /etc/php/8.0/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.0/mods-available/xhprof.ini /etc/php/8.0/cli/conf.d/20-xhprof.ini

# Sendmail
RUN git clone https://github.com/FelemixX/mailpit.git ./mailpit \
    && cd ./mailpit \
    && chmod +x ./install.sh \
    && ./install.sh \
    && ln -s /usr/local/bin/mailpit /usr/sbin/sendmail \
    && rm -rf mailpit/

COPY ./php.ini /etc/php/8.0/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/8.0/cli/conf.d/90-php.ini

#remove comments if browscap needed
#COPY ./your_browscap.ini /etc/php/8.0/fpm/conf.d/browscap.ini
#COPY ./your_browscap.ini /etc/php/8.0/cli/conf.d/browscap.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
