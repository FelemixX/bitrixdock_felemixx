FROM phpdockerio/php:8.5-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.5-gd \
    php8.5-imagick \
    php8.5-intl \
    php8.5-interbase \
    php8.5-mbstring \
    php8.5-mcrypt \
    php8.5-memcache \
    php8.5-memcached \
    php8.5-redis \
    php8.5-mysql \
    php8.5-opcache \
    php8.5-soap \
    php8.5-zip \
    php8.5-dev \
    php8.5-igbinary \
    curl \
    git \
    libtool \
    autoconf \
    build-essential \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Sendmail
RUN git clone https://github.com/axllent/mailpit.git ./mailpit \
    && cd ./mailpit \
    && chmod +x ./install.sh \
    && ./install.sh \
    && ln -s /usr/local/bin/mailpit /usr/sbin/sendmail \
    && rm -rf mailpit/

COPY ./php.ini /etc/php/8.5/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/8.5/cli/conf.d/90-php.ini

RUN usermod -u 1000 www-data

RUN echo "www-data" > /etc/cron.deny && chmod 644 /etc/cron.deny

WORKDIR "/var/www/bitrix"

EXPOSE 9000
