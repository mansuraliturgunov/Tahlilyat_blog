FROM php:8.2-apache

# PostgreSQL drayverlarini o'rnatish
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Kodlarni nusxalash
COPY ./app /var/www/html/

# Papkalarga ruxsat berish (Render uchun kerak)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80