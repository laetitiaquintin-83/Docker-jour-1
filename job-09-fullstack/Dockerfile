# On prend l'image PHP 8.2 avec Apache
FROM php:8.2-apache

# On active le module de réécriture d'URL (très important pour les projets de La Plateforme)
RUN a2enmod rewrite

# On installe proprement les drivers MySQL pour PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# On dit à Docker où travailler
WORKDIR /var/www/html