# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copier les fichiers de l'application
COPY index.html /var/www/html/
COPY save.php /var/www/html/
COPY results.json /var/www/html/

# Définir les permissions pour permettre à PHP d'écrire dans results.json
RUN chmod 777 /var/www/html/results.json

# Exposer le port 80
EXPOSE 80
