FROM php:8.5-apache

# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libicu-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        intl \
        zip \
        bcmath \
        xml \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set Laravel application directory
WORKDIR /var/www/html

# Copy Composer files first for better Docker layer caching
COPY composer.json composer.lock ./

# Install PHP dependencies without running Laravel scripts yet
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# Copy the complete Laravel application
COPY . .

# Configure Apache for Laravel
RUN rm -f /etc/apache2/sites-enabled/000-default.conf

RUN printf '%s\n' \
    '<VirtualHost *:80>' \
    '    DocumentRoot /var/www/html/public' \
    '' \
    '    <Directory /var/www/html/public>' \
    '        AllowOverride All' \
    '        Require all granted' \
    '    </Directory>' \
    '' \
    '    ErrorLog /task-management-error.log' \
    '    CustomLog /task-management-access.log combined' \
    '</VirtualHost>' \
    > /etc/apache2/sites-available/task-management.conf

RUN a2ensite task-management.conf

# Generate the Composer autoloader now that the application exists
RUN composer dump-autoload \
    --no-dev \
    --optimize \
    --no-scripts

# Create Laravel runtime directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Allow Apache/PHP to write Laravel runtime files
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

RUN chmod -R 775 \
    storage \
    bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
