# Set the base image
FROM php:8.2-fpm-alpine AS builder

# Set COMPOSER_ALLOW_SUPERUSER environment variable
ENV COMPOSER_ALLOW_SUPERUSER=1

# Set the working directory
WORKDIR C:/laragon/www/device-info-laravel

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the composer files
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Copy the project files
COPY . .

# Set directory permissions (optional)
# RUN chown -R www-data:www-data /var/www/html/device-info-laravel
RUN chown -R www-data:www-data C:/laragon/www/device-info-laravel

# Expose port 8003
EXPOSE 9000

# Ensure the Sail entry point script is executable
RUN chmod +x sail

RUN echo 'Cache invalidation'

# Start PHP-FPM server
CMD ["php-fpm"]