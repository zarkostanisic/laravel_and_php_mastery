FROM php:8.2-fpm

# 1️⃣ Instalacija osnovnih paketa
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2️⃣ PDO + MySQL
RUN docker-php-ext-install pdo pdo_mysql

# 3️⃣ Laravel osnovne ekstenzije (bez tokenizer)
RUN docker-php-ext-install mbstring xml fileinfo bcmath zip

# 4️⃣ GD (slike)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# 5️⃣ Intl (lokalizacija)
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# 6️⃣ Čišćenje da slika bude manja
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*