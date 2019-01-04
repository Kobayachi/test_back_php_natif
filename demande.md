Demande : 
====

* L'objectif est de mettre en place :
  * 1 base de données permettant des stocker 2 modèles de données
  * 2 APIs REST permettant d’effectuer les opérations de CRUD sur ces 2 modèles de données. 
  
Attention les étapes sont a réaliser dans l'ordre de préférence, et les commits et commits messages doivent clairement mettre en évidence chaque étape.
Si la stack utilisée permet de générer automatiquement plusieurs parties d'un coup, il faut l'exploiter au maximum quitte à ne pas suivre à la lettre les étapes.

Etapes :
====

Partie 1 :
----

* Initialisation du projet
* Création d’un modèle de données “user”, et mise en place de sa persistance en base de données.
* Propriétés du modèle “user”: 
  * id (entier naturel unique) 
  * age (entier naturel / non nul / non unique)
  * balance (entier relatif / peut être nul / non unique)
  * firstname (chaîne de caractères / non nul / non unique)
  * lastname (chaîne de caractères / non nul / non unique)
  * cars (array)

Partie 2 :
----

* Création d’un modèle de données “car”, et mise en place de sa persistance en base de données.
* Propriétés du modèle “car” : 
  * id (entier naturel / non nul / unique)
  * brand (chaîne de caractères / non nul / non unique)
  * model (chaîne de caractères / non nul / non unique)
  * value (entier naturel / peut être nul / non unique)

Partie 3 : 
----

* Mise en place d’une API REST sur le modèle “user” : 
Lorsque je fais une requête GET sur “/api/users” sans paramètres, 
Alors l’API renvoie la liste de tous les “user” stockés dans la base de données,
Et cette liste doit être au format JSON

Partie 4 : 
----

* Mise en place d’une API REST sur le modèle “car” : 
Lorsque je fais une requête GET sur “/api/cars” sans paramètres, 
Alors l’API renvoie la liste de tous les “car” stockés dans la base de données,
Et cette liste doit être au format JSON

Partie 5 : 
----

* Amélioration de l’application de façon à permettre à l’API “users” de gérer l’ensemble des actions CRUD sur un “user”: 

* Exemple 1 : 
Lorsque je fais une requête POST sur “/api/users” avec en paramètre l’objet json suivant : 
{ user: { age: 32, firstname: “John”, lastname: “Doe” } }
Alors un nouvel enregistrement est ajouté à la base de données,
Et l’API renvoie l’ensemble des données concernant ce nouveau modèle de donnée

* Exemple 2 : 
Lorsque je fais une requête PUT sur “api/users/33” avec en paramètre l’objet json suivant : 
{ user: { age: 32, balance: 477, firstname: “John”, lastname: “Doe” } }
Alors le “user” avec l’id 33 est mis à jour dans la base de données avec les données passées en paramètre.

Partie 6 :
----

* Mise en place de la gestion des erreurs sur les requêtes faites sur l’API “users”

Remarques
===
Si les frameworks utilisés permettent de réaliser plusieurs étapes d'un coup, il faut exploiter le framework, et préciser dans les commentaires du commit pourquoi le plan demandé n'a pas été suivi.
