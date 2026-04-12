FROM php:8.2-fpm

# PostgreSQL uchun drayverlarni o'rnatish
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql