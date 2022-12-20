
# Set master image
FROM php:8.2-fpm-alpine3.16

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache \
    bash \
    build-base shadow vim curl \
    php8 \
    php8-fpm \
    php8-common \
    php8-pdo \
    php8-pdo_mysql \
    php8-mysqli \
    php8-mbstring \
    php8-xml \
    php8-openssl \
    php8-json \
    php8-phar \
    php8-zip \
    php8-gd \
    php8-dom \
    php8-session \
    php8-zlib \
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