# mymedical

Projet annuel final kercode

# A propos du projet

L’objectif de cette application est de permettre aux tiers d’avoir un avis ou conseil par un médecin
sur une pathologie pouvant être soignée ou atténuée avec des médicaments ne nécessitant pas d’ordonnance.
L'application est accessible via ce lien : https://greta-bretagne-sud.fr/stagiaires-kercode/pape-alla-mbaye/mymedical/


# Technologies utilisées :

    - HTML / CSS
    - JavaScript
    - PHP
    - SQL

# Utilitaires

    - Composer
    - Looping
    - VSCode
    - PHPMyAdmin
    
Installation du projet

Lien du repository: https://github.com/Pape91/mymedical.git

En tout premier lieu, via la console, effectuer un git clone

    Git clone

git clone https://github.com/Pape91/mymedical.git

#Installer Composer si vous ne l'avez pas (https://getcomposer.org/download/) puis effectuer en ligne de commande un

composer install

    Variables d'environnement

Renommer le fichier .env.example en .env en remplissant les champs adéquats
```
  DB_NAME = 'Nom de la base de données'
  DB_HOST = 'Adresse de la base données'
  DB_PORT = 'Port utilisé'
  DB_USERNAME = 'Utilisateur de la base de données'
  DB_PASSWORD = 'Mot de passe de la base de données'
  SITE_URL = 'URL du serveur'
```

Base de données

La base de données Mymedical(2).sql se trouve dans le dossier app/modele/ à la racine du projet. 
Elle contient les tables nécessaires au bon fonctionnement de l'application.

Il y a trois utilisateurs enregistrés:

un administrateur:

Login : admin@admin.fr
MdP : admin

un medecin

Login: medecin@medecin.fr
Mdp : medecin

un patient
Login : patient@patient.fr
Mdp : patient
