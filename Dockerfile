FROM php:8.2-apache

# Sistem paketləri
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl

# PHP uzantıları
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Apache Ayarları
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# 🚨 ÇOX VACİB: İcazələri tam veririk (500 xətası buna görə olur)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Paketləri yüklə
RUN composer update --no-dev --optimize-autoloader

# Köhnə sətirləri bunlarla əvəz et:
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

# SQLite faylını yaradır, icazələri verir və miqrasiya edir
CMD touch database/database.sqlite && \
    chmod -R 775 database storage && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT
