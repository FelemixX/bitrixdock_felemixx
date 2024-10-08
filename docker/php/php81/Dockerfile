FROM phpdockerio/php:8.1-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.1-gd \
    php8.1-imagick \
    php8.1-intl \
    php8.1-interbase \
    php8.1-mbstring \
    php8.1-mcrypt \
    php8.1-memcache \
    php8.1-memcached \
    php8.1-redis \
    php8.1-mysql \
    php8.1-opcache \
    php8.1-soap \
    php8.1-xdebug \
    php8.1-zip \
    php8.1-dev \
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
    && echo "extension=xhprof.so" > /etc/php/8.1/mods-available/xhprof.ini \
    && ln -s /etc/php/8.1/mods-available/xhprof.ini /etc/php/8.1/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.1/mods-available/xhprof.ini /etc/php/8.1/cli/conf.d/20-xhprof.ini

# Sendmail
RUN git clone https://github.com/FelemixX/mailpit.git ./mailpit \
    && cd ./mailpit \
    && chmod +x ./install.sh \
    && ./install.sh \
    && ln -s /usr/local/bin/mailpit /usr/sbin/sendmail \
    && rm -rf mailpit/

COPY ./php.ini /etc/php/8.1/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/8.1/cli/conf.d/90-php.ini

#remove comments if browscap needed
#COPY ./your_browscap.ini /etc/php/8.1/fpm/conf.d/browscap.ini
#COPY ./your_browscap.ini /etc/php/8.1/cli/conf.d/browscap.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
