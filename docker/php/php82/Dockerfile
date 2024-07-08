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
    php8.2-dev \
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
    && echo "extension=xhprof.so" > /etc/php/8.2/mods-available/xhprof.ini \
    && ln -s /etc/php/8.2/mods-available/xhprof.ini /etc/php/8.2/fpm/conf.d/20-xhprof.ini \
    && ln -s /etc/php/8.2/mods-available/xhprof.ini /etc/php/8.2/cli/conf.d/20-xhprof.ini

# Sendmail
RUN go install github.com/mailhog/MailHog@latest

COPY ./php.ini /etc/php/8.2/fpm/conf.d/90-php.ini
COPY ./php.ini /etc/php/8.2/cli/conf.d/90-php.ini

#remove comments if browscap needed
#COPY ./your_browscap.ini /etc/php/8.2/fpm/conf.d/browscap.ini
#COPY ./your_browscap.ini /etc/php/8.2/cli/conf.d/browscap.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
