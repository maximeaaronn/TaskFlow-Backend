# TaskFlow - Backend

## Présentation
API RESTful développée avec Laravel pour gérer la logique métier, la persistance des données et la sécurité du projet TaskFlow.

### Technologies utilisées
- PHP / Laravel,
- MySQL (Base de données relationnelle),
- PHPUnit (Tests unitaires et fonctionnels du backend)

#### Fonctionnalités
- Endpoints API REST pour le CRUD des tâches et des utilisateurs,
- Gestion des migrations de base de données,
- Validation des données et sécurisation des routes

##### Installation et Lancement
Pour configurer et lancer l'API en local :
1. Installer les dépendances : `composer install`
2. Configurer le fichier d'environnement : `.env` (pour gérer vos accès à la base de données),
3. Générer la clé de l'application : `php artisan key:generate`
4. Lancer les migrations : `php artisan migrate`
5. Démarrer le serveur API : `php artisan serve`