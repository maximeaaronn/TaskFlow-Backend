FROM php:8.2-apache

# Installer les dépendances système et extensions PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Activer mod_rewrite pour Apache (nécessaire pour les routes Laravel)
RUN a2enmod rewrite

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail dans le conteneur
WORKDIR /var/www/html

# Copier le code du projet
COPY . /var/www/html

# Lancer l'installation des dépendances Composer pendant la construction
RUN composer install --no-dev --optimize-autoloader

# Donner les bons droits au dossier public de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configurer le DocumentRoot d'Apache pour qu'il pointe vers le dossier /public de Laravel
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Lancer les migrations et démarrer Apache
CMD ["sh", "-c", "php artisan migrate --force && apache2-foreground"]
