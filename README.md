### Port
- port utilisé en vidéo : 3306
- port utilisé perso : 3307
- Port PHP = voir compose.yaml => Connection http://localhost:8080

### Démarrer
- docker compose up -d --build
- accéder à la console php : make bash

### Sommaire de la vidéo
- 00:00 - Introduction  **OK**
- 00:37 - Démonstration de l'application web    **OK**
- 05:55 - Présentation de Hostinger **OK**
- 07:00 - Présentation du dépôt Git **OK**
- 07:57 - Clonage du dépôt Git  **OK**
- 11:50 - Création de la page d'accueil **OK**
- 12:57- Création des entités Doctrine  **OK**
- 26:00 - Installation de Bootstrap avec l'AssetMapper  **OK**
- 27:40 - Création de la page d'inscription **OK**
- 42:52 - Création de la page de connexion  **OK**
- 51:55 - Création de la Navbar
- 51:10 - Fonctionnalité : Créer un projet
- 01:15:00 - Fonctionnalité : Liste des projets
- 01:33:16 - Fonctionnalité : Créer un ticket
- 01:55:45 - Fonctionnalité : Afficher / Modifier un ticket / Ajouter des pièces jointes
- 02:54:34 - Fonctionnalité : Tableau de bord d'un projet
- 03:18:10 - Fonctionnalité : Afficher / Modifier son profil utilisateur
- 03:27:18 - Déployer l'application en production sur Hostinger avec Portainer
- 03:34:17 - Outro

### A rajouter
- ligne 39 html register = <p class="my-3 text-muted"> Vous avez déja un compte ? <a href="{{path('login')}}" class="text-decoration-none">Se connecter </a></p>