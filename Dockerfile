FROM php:8.3-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-install intl zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js & npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf


# FROM php:8.3-apache

# # Enable Apache rewrite
# RUN a2enmod rewrite

# # System dependencies
# RUN apt-get update && apt-get install -y \
#     git unzip curl libpng-dev libjpeg-dev libwebp-dev libxml2-dev libonig-dev zip \
#     && docker-php-ext-configure gd --with-jpeg --with-webp \
#     && docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Install Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Install Node.js & npm
# RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
#     && apt-get install -y nodejs

# # Set working dir
# WORKDIR /var/www/html

# # Apache config for Laravel
# COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf
