FROM php:8.2-fpm

ARG USER
ARG UID

WORKDIR /var/www/html

COPY . .

# Criando usuário com as mesmas característcas do usuário host
RUN if [ "$USER" != "root" ]; then echo "Creating $USER" && \
    useradd -G www-data,root -u $UID -d /home/$USER $USER && \ 
    mkdir -p /home/$USER/.compose && \
    chown -R $USER:$USER /home/$USER;fi;


# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl \
    net-tools \
    procps \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ajusta permissões da pasta de armazenamento e cache para o Laravel funcionar corretamente
RUN chown -R $USER:$USER /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

USER $USER

EXPOSE 8000
