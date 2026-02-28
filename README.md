PHP_PROJET – Gestion des Étudiants (PHP + Flask API)
1.  Description
Ce projet est une application web de gestion des étudiants développée en :
- PHP (Frontend + Consommation API)
-  Flask (Backend API REST en Python)
-  XAMPP (Apache + PHP)
-  JSON (échange de données)
L'application PHP communique avec une API Flask locale (TP1_etdt.py) qui gère les opérations CRUD sur une liste d'étudiants.
Elle doit Communiquer entre une API REST (Flask) et un Client PHP

2. Contexte et Objectif du TP
Ce projet a été réalisé dans le cadre d’un travail pratique visant à mettre en œuvre :
- La création d’une API REST avec Flask (Python)
- La consommation d’une API REST en PHP
- La manipulation des requêtes HTTP (GET, POST, PUT, DELETE)
- L’échange de données au format JSON
- L’architecture client–serveur
L’objectif principal est de développer une application web permettant la gestion des étudiants (CRUD) en utilisant une architecture répartie :
- Backend : API REST en Flask
-  Frontend : Application PHP
-  Serveur local : XAMPP (Apache)
  
3. Architecture Générale
- Architecture du système

  <img width="317" height="207" alt="image" src="https://github.com/user-attachments/assets/b11e40ad-b3bc-4ee8-a93b-dc1f94b941e8" />

Le client PHP envoie des requêtes HTTP à l’API Flask.
L’API traite la demande et retourne une réponse JSON.

4. Architecture du Projet
- Structure des dossiers

   <img width="340" height="531" alt="image" src="https://github.com/user-attachments/assets/5e29d828-77de-4350-913f-1bc4b6d9e981" />

5. Fichier API Flask (situé sur le bureau) :TP1_etdt.py

6. Technologies Utilisées et rôle
- Python : Développement de l’API
- Flask  : Framework Web REST
- PHP    : Client Web
- HTML/CSS : Interface utilisateur
- JSON   : Format d’échange
- XAMPP  : Serveur local Apache

7. Description de l’API Flask
 Fichier : TP1_etdt.py
L’API contient une liste locale d’étudiants :

 <img width="334" height="129" alt="image" src="https://github.com/user-attachments/assets/d7972e93-fdfe-4a0d-927d-557c38f8d71a" />
 
 8. Endpoints implémentés

<img width="368" height="301" alt="image" src="https://github.com/user-attachments/assets/18780dfb-fd37-4a8a-ae8b-dbe60a3e36c3" />

Les données sont échangées au format JSON via jsonify().

9. Description du Client PHP
- Classe StudentService.php
Cette classe joue le rôle d’intermédiaire entre l’application PHP et l’API Flask.
Elle implémente :
- getAllStudents()
- getStudentById( $ id)
- addStudent( $ name,  $ age)
- updateStudent( $ id, $name,  $ age)
- deleteStudent( $ id)
Les requêtes HTTP sont envoyées via :
  --file_get_contents()
  --stream_context_create()

10. Fonctionnalités Implémentées
L’application permet :
- Affichage de la liste des étudiants
- Recherche d’un étudiant par ID
- Ajout d’un étudiant
- Modification d’un étudiant
- Suppression d’un étudiant
- Affichage détaillé  
Il s’agit d’un CRUD complet.

11. Mise en Place et Exécution
 Étape 1 : Lancer l’API Flask
Dans le terminal :
  --cd Bureau
  -- python TP1_etdt.py
- L’API sera disponible à l’adresse : http://127.0.0.1:5000
- Envoie une requête au serveur Flask local, sur la route /students: http://127.0.0.1:5000/students 

Décomposition de l’URL

<img width="378" height="198" alt="image" src="https://github.com/user-attachments/assets/b1f7e515-6f9b-41ab-8e24-9d4bf9b4051c" />


  Étape 2 : Lancer l’application PHP
Placer le dossier php_projet dans :
  -- xampp/htdocs/
  -- Démarrer Apache via XAMPP  
Accéder à : http://localhost/php_projet/index.php

12.  Points Techniques Importants
L’API doit être lancée avant l’application PHP.
Les données sont stockées en mémoire (pas de base de données).
Les identifiants sont générés automatiquement.
La communication repose exclusivement sur HTTP + JSON.

13. Limites du Projet
 Pas de base de données persistante
 Pas d’authentification
 Validation minimale des données
 Pas de gestion avancée des erreurs HTTP

14. Améliorations Possibles
Intégration d’une base de données (MySQL)
Ajout d’une authentification (JWT)
Gestion complète des codes HTTP
Mise en place d’un framework PHP (Laravel)
Architecture MVC complète

Conclusion
Ce projet démontre :
La compréhension des principes REST
La manipulation des méthodes HTTP
L’échange de données JSON
L’intégration d’un backend Python avec un frontend PHP

Il illustre concrètement la communication entre deux technologies différentes via une API REST.

