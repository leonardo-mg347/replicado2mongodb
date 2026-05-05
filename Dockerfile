FROM php:8.5-cli

RUN sed -i 's|main|main non-free|' /etc/apt/sources.list.d/debian.sources && apt-get update && apt-get install -y \
    unixodbc \
    unixodbc-dev \
    freetds-bin \
    freetds-dev \
    libicu-dev \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libssl-dev \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# php libs (Core)
RUN docker-php-ext-install \
    intl \
    pdo_mysql \
    soap \
    zip \
    mbstring \
    bcmath \
    pdo_dblib

# Driver do MongoDB (Obrigatório para CLI também)
RUN pecl install mongodb && docker-php-ext-enable mongodb

# gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# php memory
ENV PHP_MEMORY_LIMIT=512M
RUN echo "memory_limit=${PHP_MEMORY_LIMIT}" > "${PHP_INI_DIR}/conf.d/memory.ini"

# php errors (ocultar deprecated no CLI)
RUN echo "display_errors=Off" > "${PHP_INI_DIR}/conf.d/errors.ini" \
 && echo "log_errors=On" >> "${PHP_INI_DIR}/conf.d/errors.ini" \
 && echo "error_reporting=E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED" >> "${PHP_INI_DIR}/conf.d/errors.ini"

# Setup do diretório de trabalho
WORKDIR /app

COPY . .
RUN composer install

CMD ["tail", "-f", "/dev/null"]