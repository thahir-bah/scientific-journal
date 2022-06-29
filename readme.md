## A propos du projet

--Pour la mise en place de ce projet vous devez avoir:
php version 7.1.3 installer dans votre terminal 

## Pour la mise en place du projet

Après le téléchargement de notre projet de fin d'étude, vous devez tout d'abord:
--Configurer le fichier .env en changeant les paramêtres de base de données telles que :
DB_CONNECTION: le type de connexion a la base de données
DB_HOST: l'adresse du server de base de données
DB_PORT: le numéro de port qu'utilise la base de données
DB_DATABASE: le nom de la base de données que vous utiliserez pour ce journal
DB_USERNAME: le nom d'utilisateur de la base de données
DB_PASSWORD: le mot de passe a la base de données

--Accéder au dossier du projet via le terminal et exécuter les commandes suivantes:
php artisan migrate:  pour faire migrer les différentes table de la base de données
php artisan db:seed pour faire une insertion des différents enregistrement par défaut à la base de données
php artisan serve : pour exécuter le projet

--Les identifiants de connexion pour un administrateur sont:
email: admin@admin.com
password: Gi@2022

--Le mot de passe  par défaut de tous les utilisateurs crées par l'administrateur: journalfsts

