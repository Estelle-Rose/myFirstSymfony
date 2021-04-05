# My first symfony app  

Mon apprentissage de Symfony avec différents objectifs à accomplir  :  
## Prérequis
PHP / MySQL ou MariaDB /Composer /Symfony 5 / Npm / Yarn  
Pour lancer le projet : 
* ```composer install ``` 
* ```npm install ``` 
* ```yarn install ```
* ```yarn run encore dev --watch```
* ```symfony server:start ```  

Pour l'accès aux blocs 2/3 et 4 :  
* modifier le fichier .env avec informations de connexion à la BDD : DATABASE_URL=mysql://User:Password@127.0.0.1:3306/nameDatabasse?serverVersion=10.4.18
* lancer la création de la BDD avec ```symfony console doctrine:database:create```
* Exécuter la migration  en BDD ```symfony console doctrine:migration:migrate```
* Loader les datafixtures : ```php bin/console doctrine:fixtures:load```

## Bloc personnages
* Réviser les bases de PHP
* Réviser les bases de POO
* Revoir le modèle MVC
* Créer une application Symfony et  :  
- Utiliser les routes  
- Utiliser le système de template Twig  
- Comprendre l'architecture globale du framework 
## Bloc animalerie
* Créer une application utilisant une base de données
* Utiliser le système de BDD de Symfony (Doctrine + Fixtures)
* Afficher des éléments d'une BDD

## Bloc épicerie
* Mettre en application les notions précédentes
* Utilisation avancée de doctrine et des repositories
* Mise en place d'un CRUD
* Réalisation des formulaires
* Uploader une image
* Validation des données
* Ajout de la partie authentification
* Ajout d'une gestion basique de rôle

## Bloc cars
* Réaliser une pagination
* Ajouter des filtres
* Réaliser un site à partir d'une spécification basique
* Utilisation de Faker
* Réutilisation de toutes les notions déjà étudiées
* Déploiement