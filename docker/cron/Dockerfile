ARG PHP_VERSION

FROM php:$PHP_VERSION-cli-alpine

ARG UID
ARG GID

RUN apk add --no-cache tzdata && \
	mkdir -p /tmp/php_upload/www && chmod -R 777 /tmp/php_upload/www && \
	apk add --no-cache shadow && usermod -u $UID www-data && groupmod -g $GID www-data && \
	apk add --no-cache openssh curl wget git msmtp libzip-dev oniguruma-dev libzip-dev libpng-dev freetype libjpeg-turbo-dev libmcrypt-dev freetype-dev libcurl curl-dev libxml2-dev autoconf g++ make && \
	chmod u+s /bin/busybox \
	printf "\n" | pecl install mcrypt && \
	docker-php-ext-configure soap && \
	docker-php-ext-configure gd && \
	docker-php-ext-configure pdo && \
	docker-php-ext-configure pdo_mysql && \
	docker-php-ext-install soap mbstring mysqli opcache xml zip gd pdo pdo_mysql && \
	mkdir -p /tmp/php_sessions/www && chown -R www-data:www-data /tmp/php_sessions/ && \
	mkdir -p /home/www && chown -R www-data:www-data /home/www && \
	cd /tmp && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	php composer-setup.php && php -r "unlink('composer-setup.php');" && \
	mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer && rm -rf /etc/apk/cache
