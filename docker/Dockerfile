FROM php:8.4-fpm-alpine AS app

# Install utilities and needed PHP extensions
RUN apk add --no-cache git unzip bash bash-completion mc libpq-dev $PHPIZE_DEPS \
    && docker-php-ext-install pdo pdo_pgsql \
    && apk del --no-network $PHPIZE_DEPS

# Install Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Expose FPM port (for nginx upstream)
EXPOSE 9000

# Default command runs php-fpm
CMD ["php-fpm"]
