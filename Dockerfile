FROM php:8.3-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip zip curl git libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all project files
COPY . /var/www/html
WORKDIR /var/www/html

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set file & folder permissions
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html/storage \
 && chmod -R 755 /var/www/html/bootstrap/cache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set document root ke /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# ✅ JALANKAN MIGRATE dan START Apache
# CMD php artisan config:clear && php artisan migrate --force && apache2-foreground
