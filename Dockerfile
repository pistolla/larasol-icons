
# Set master image
FROM php:7.4-fpm-alpine3.14

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache \
    bash \
    build-base shadow vim curl \
    php7 \
    php7-fpm \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib \
    zip libzip-dev \
    $PHPIZE_DEPS \
		freetype-dev \
    libjpeg-turbo-dev \
		libpng-dev

# Add PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-install zip exif

# Add gd extension
RUN docker-php-ext-configure gd \
    --with-jpeg \
    --with-freetype && \
  docker-php-ext-install gd

# Add php.ini
RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
#RUN usermod -u 1000 www-data

# Copy existing application directory permissions
COPY --chown=www:www . /var/www
RUN chmod 775 /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]