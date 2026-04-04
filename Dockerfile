FROM php:8.2-apache

# Sistem paketləri və kitabxanalar
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl

# PHP uzantıları (PostgreSQL və MySQL dəstəyi ilə)
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Apache-ni Laravel üçün kökləyirik
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

# Composer-i rəsmi imicdən götürürük
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Layihə fayllarını köçürürük
WORKDIR /var/www/html
COPY . .

# Lazımi qovluqlara icazə veririk
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Paketləri yükləyirik
RUN composer install --no-dev --optimize-autoloader

# Bazanı avtomatik miqrasiya etmək üçün
CMD php artisan migrate --force && apache2-foreground

# Portu 80 olaraq təyin edirik
EXPOSE 80
