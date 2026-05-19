# Tic Tac Toe - Docker Project

## Objectif du Projet

Créer une image Docker et un volume pour héberger une application web Tic Tac Toe (Morpion) avec persistance des résultats dans un fichier `results.json`.

## Architecture

- **Image Docker** : PHP 8.2 avec Apache
- **Port** : 80 (interne) → 8080 (externe)
- **Volume nommé** : `game-results` pour persister les résultats

## Fichiers du Projet

```
job 05/
├── index.html           # Interface du jeu Tic Tac Toe
├── save.php            # Script PHP pour sauvegarder les résultats
├── results.json        # Fichier contenant les résultats
├── Dockerfile          # Configuration Docker
├── .dockerignore       # Fichiers à ignorer
├── images/             # Dossier pour les captures d'écran
└── README.md           # Ce fichier
```

## Prérequis

- Docker Desktop installé et exécuté
- Terminal PowerShell ou CMD
- Port 8080 disponible

---

## Étapes d'Exécution

### 1. Construire l'Image Docker

```bash
cd "C:\laragon\www\Docker Jour 1\jour 3\job 05"
docker build -t tictactoe:latest .
```

**Explication** : Construit l'image Docker à partir du Dockerfile avec le tag `tictactoe:latest`.

### 2. Créer le Volume Docker

```bash
docker volume create game-results
```

**Explication** : Crée un volume nommé `game-results` pour persister les résultats du jeu.

### 3. Vérifier la Création du Volume

```bash
docker volume ls
docker volume inspect game-results
```

**Explication** : Liste tous les volumes et affiche les détails de `game-results`.

### 4. Exécuter le Conteneur

```bash
docker run -d -p 8080:80 --name tictactoe-game --volume game-results:/var/www/html tictactoe:latest
```

**Explication détaillée** :
- `-d` : Mode détaché (en arrière-plan)
- `-p 8080:80` : Mapper le port 8080 de l'hôte au port 80 du conteneur
- `--name tictactoe-game` : Nom du conteneur
- `--volume game-results:/var/www/html` : Monter le volume dans le conteneur

### 5. Vérifier que le Conteneur s'Exécute

```bash
docker ps
docker logs tictactoe-game
```

**Explication** : Affiche les conteneurs actifs et les logs du conteneur.

### 6. Accéder à l'Application

Ouvrez votre navigateur et allez à :

```
http://localhost:8080
```

### 7. Jouer au Jeu

Jouez plusieurs parties compètes au Tic Tac Toe. À chaque victoire ou match nul, le résultat est sauvegardé automatiquement dans `results.json` via le script `save.php`.

### 8. Consulter les Résultats Sauvegardés

#### Via le Terminal

```bash
docker exec tictactoe-game cat /var/www/html/results.json
```

**Exemple de résultat** :
```json
[
  {"winner": "X"},
  {"winner": "O"},
  {"winner": "Draw"}
]
```

#### Via Docker Desktop

1. Ouvrez **Docker Desktop**
2. Onglet **"Containers"** → `tictactoe-game`
3. Onglet **"Files"** → `/var/www/html/results.json`

### 9. Afficher le Contenu du Volume Directement

#### Via le Terminal

```bash
docker run --rm -v game-results:/data alpine cat /data/results.json
```

#### Via Docker Desktop

1. Ouvrez **Docker Desktop**
2. Onglet **"Volumes"** → `game-results`

### 10. Consulter le Contenu du Conteneur

```bash
docker exec tictactoe-game ls -la /var/www/html
```

### 11. Arrêter le Conteneur

```bash
docker stop tictactoe-game
```

---

## Résultats des Tests

### Captures d'Écran

#### 1. Interface du Jeu au Chargement
[Insérer une capture du jeu]

#### 2. Pendant une Partie
[Insérer une capture du jeu en cours]

#### 3. Résultat d'une Partie
[Insérer une capture du résultat final]

#### 4. Contenu de results.json après Plusieurs Parties
[Insérer une capture du contenu du fichier]

---

## Commandes Utiles

### Afficher les Logs en Temps Réel
```bash
docker logs -f tictactoe-game
```

### Accéder au Shell du Conteneur
```bash
docker exec -it tictactoe-game bash
```

### Redémarrer le Conteneur
```bash
docker restart tictactoe-game
```

### Supprimer le Conteneur
```bash
docker rm tictactoe-game
```

### Supprimer l'Image
```bash
docker rmi tictactoe:latest
```

### Supprimer le Volume
```bash
docker volume rm game-results
```

---

## Compétences Acquises

✅ Créer et construire une image Docker  
✅ Exploiter les volumes Docker pour la persistance de données  
✅ Configurer PHP avec Apache dans un conteneur  
✅ Mapper les ports Docker  
✅ Vérifier et inspecter les conteneurs et volumes  

---

## Problèmes Courants et Solutions

### Le jeu ne charge pas
```bash
# Vérifier que le conteneur s'exécute
docker ps

# Vérifier les logs
docker logs tictactoe-game

# S'assurer que le port 8080 n'est pas utilisé
netstat -ano | findstr :8080
```

### Les résultats ne se sauvegardent pas
```bash
# Vérifier que le volume est monté
docker inspect tictactoe-game | grep -A 10 Mounts

# Vérifier les permissions
docker exec tictactoe-game ls -l /var/www/html/results.json

# Vérifier les logs
docker logs tictactoe-game
```

### Erreur "Port 8080 already in use"
```bash
# Utiliser un port différent
docker run -d -p 8081:80 --name tictactoe-game --volume game-results:/var/www/html tictactoe:latest
```

---

## Architecture Complète

```
┌─────────────────────────────────────┐
│  Navigateur (localhost:8080)        │
└────────────────┬────────────────────┘
                 │
         HTTP Port 8080
                 │
         ┌───────▼────────┐
         │  Docker Host   │
         │  Port 8080     │
         └────────┬───────┘
                  │
         Port Mapping 8080:80
                  │
         ┌────────▼────────────────┐
         │   Docker Container      │
         │   (tictactoe-game)      │
         ├─────────────────────────┤
         │ Apache + PHP 8.2        │
         │ Port 80                 │
         │ ├─ index.html           │
         │ ├─ save.php             │
         │ └─ results.json         │
         └────────┬────────────────┘
                  │
         ┌────────▼────────────────┐
         │  Volume: game-results   │
         │  ├─ index.html          │
         │  ├─ save.php            │
         │  └─ results.json        │
         └─────────────────────────┘
```

---

## Ressources

- [Docker Documentation](https://docs.docker.com/)
- [PHP Docker Image](https://hub.docker.com/_/php)
- [Docker Volumes](https://docs.docker.com/storage/volumes/)
