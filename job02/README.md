# 🍄 Job 02 : Déploiement du jeu Mario

**Note technique :** L'image `kaminskypavel/mario` demandée dans l'énoncé utilise un manifest v1 obsolète qui n'est plus supporté par les versions récentes de Docker Desktop (containerd v2.1+). Pour contourner ce problème, j'ai utilisé une image alternative maintenue à jour (`pengbai/docker-supermario`).

J'ai déployé le conteneur en tâche de fond (`-d`) et mappé le port 4545 de ma machine vers le port 8080 du conteneur.

Voici le résultat accessible depuis mon navigateur sur `localhost:4545` :

![Jeu Mario](./mario.png)# 🍄 Job 02 : Déploiement du jeu Mario

**Note technique :** L'image `kaminskypavel/mario` demandée dans l'énoncé utilise un manifest v1 obsolète qui n'est plus supporté par les versions récentes de Docker Desktop (containerd v2.1+). Pour contourner ce problème, j'ai utilisé une image alternative maintenue à jour (`pengbai/docker-supermario`).

J'ai déployé le conteneur en tâche de fond (`-d`) et mappé le port 4545 de ma machine vers le port 8080 du conteneur.

Voici le résultat accessible depuis mon navigateur sur `localhost:4545` :

![Jeu Mario](./mario.png)