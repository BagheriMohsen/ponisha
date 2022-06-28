FROM php:8.1-cli

COPY . /app/
WORKDIR /app/

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN php /usr/local/bin/composer install

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

ENV APP_ENV=production
ENV APP_DEBUG=false

RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo pdo_mysql

RUN php artisan config:cache && \
    php artisan route:cache
