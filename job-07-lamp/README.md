# Job 07 - Stack LAMP avec Docker Compose

Cet environnement de développement contient une stack PHP 8.2 Apache, MySQL 8 et phpMyAdmin.

## 🚀 Lancement de l'infrastructure

Pour démarrer l'ensemble des services en arrière-plan, exécutez la commande suivante dans votre terminal :
```bash
docker compose up -d

🌐 Accès aux services
Application Web (PHP/Apache) : http://localhost:8080

Gestionnaire de base de données (phpMyAdmin) : http://localhost:8081

🛑 Arrêt des conteneurs
Pour stopper la stack sans supprimer vos données persistées :

docker compose down

