# Votre ToDoList AVEC BASE DE DONNÉES

Bienvenue dans le projet `CHAT` ! Ce projet implémente une application de messagerie type  `chat` avec espace login et session de cookies. Les `Utilisateurs` envoient des messages dans un `forum` commun et chaque message mentionne le nom de l'utilisateur.

## Table des matières

- [Aperçu de mon projet](img/apercu_chat.png)
- [Démonstration](vidéos/Démo-Chat.mp4)
- [Fonctionnalités](#fonctionnalités)
- [Comment utiliser](#comment-utiliser)
- [Installation](#installation)
- [Configuration de la base de données](#configuration-de-la-base-de-données)
- [Contribuer](#contribuer)

## Aperçu

**Le Chat** comme son nom l'indique est une application de communication, qui propose un `Forum` dans lequel vous pouvez poser vos multiples questions et d'autres utilisateurs pourront vous répondre. Pour celà vous devez vous `Inscrire` et ensuite vous `Connecter` avec votrer nom d'utilisateur et votre `Mot de passe`(les mots de passe son chiffrés).


## Démonstration

- [Voir la vidéo de démonstration](vidéos/Démo-Chat.mp4)


## Fonctionnalités

- Création de compte Utilisateur.
- Authentication des utilisateurs
- Envoi/Reçeption de messages.

## Comment utiliser

1. Clonez ou téléchargez ce projet sur votre ordinateur.
2. Accédez à votre répertoire local où se trouve le projet.
3. Lancez un serveur local (ex : XAMPP, WAMP, ou un autre serveur web local).
4. Accédez à l'URL fournie par votre serveur local pour ouvrir `index.php` dans un navigateur web.
5. Commencez à utiliser l'application pour envoyer vos messages dans le forum  !

## Installation

Aucune installation supplémentaire n'est nécessaire pour les fichiers du projet. Vous devez cependant configurer une base de données en local pour utiliser l'application.

## Configuration de la base de données

Pour utiliser cette application, vous avez besoin d'une base de données en local. Voici comment la configurer :

1. **Choisissez un gestionnaire de base de données** : Nous vous recommandons d'utiliser XAMPP (pour Windows, macOS ou Linux), WAMP (pour Windows) ou MAMP (pour macOS) pour une gestion facile des bases de données MySQL.
   
2. **Créez une base de données** : Ouvrez le gestionnaire de base de données de votre choix (par exemple, phpMyAdmin pour XAMPP ou WAMP) et créez une nouvelle base de données nommée `Chap-App`.

3. **Créez deux tables** : 
Dans la base de données `Chat-App`, créez une table `users` avec les colonnes suivantes :
    - `id` : INT (clé primaire, auto-incrément).
    - `username` : VARCHAR (nom de L#utilisateur).
    - `password` : varchar (mot de passe de l'utilisateur).
Ensuite créez une table `messages` avec les colonnes suivantes:
    - `id_chat` : INT (clé primaire, auto-incrément).
    - `message` : TEXT (le message qui sera invoyé dans le forum).
    - `id_auteur` : INT (auteur du message envoyé).
    - `pseudo` : VARCHAR (nom d'utilisateur de l'auteur du message envoyé).
    _ `date_publication`: DATETIME CURENTTIMESTAMP (date de publication du message).

vous pouvez visualiser mes tables dans ma base de donnee ci dessous.
_ `Base de données`:
![voici un exemple](img/bd.png)

_ table `users`:
![voici un exemple](img/user.png)

_ table `messages`:
![voici un exemple](img/message.png)

4. **Modifiez `db.conn.php`** : Dans votre projet, ouvrez le fichier `db.conn.php` et modifiez les informations de connexion à votre base de données (nom d'hôte, nom de la base de données, nom d'utilisateur, mot de passe) selon votre configuration.

## Contribuer

Les contributions à ce projet sont les bienvenues ! N'hésitez pas à soumettre des problèmes, suggestions ou améliorations via GitHub.
