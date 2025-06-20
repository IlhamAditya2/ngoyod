FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip zip curl git libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin semua file proyek ke folder Apache
COPY . /var/www/html/

# Ubah hak kepemilikan
RUN chown -R www-data:www-data /var/www/html

# Aktifkan mod_rewrite (untuk .htaccess Laravel/CodeIgniter)
RUN a2enmod rewrite
