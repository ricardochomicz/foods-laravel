FROM php:8.2-fpm

# Definir diretório de trabalho
WORKDIR /var/www/foods-laravel

# Instalar dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar composer.lock e composer.json
COPY composer.lock composer.json /var/www/foods-laravel/

# Instalar dependências do Composer sem executar scripts
RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader

# Copiar o restante da aplicação para o container
COPY . /var/www/foods-laravel

# Ajustar permissões para o diretório de trabalho
RUN chown -R www-data:www-data /var/www/foods-laravel \
    && chmod -R 755 /var/www/foods-laravel

# Instalar dependências do Composer completas
RUN composer dump-autoload

# Expor a porta 9000
EXPOSE 9000

# Definir usuário para rodar o processo
USER www-data

# Comando para rodar o PHP-FPM
CMD ["php-fpm"]
