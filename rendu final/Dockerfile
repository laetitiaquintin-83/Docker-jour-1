# 1. On part d'une base de serveur web très légère
FROM nginx:alpine

# 2. On prend notre page web locale et on la met dans le conteneur à la place de celle par défaut
COPY index.html /usr/share/nginx/html/index.html

# 3. On ouvre la porte numéro 80 pour que le monde entier puisse voir la page
EXPOSE 80