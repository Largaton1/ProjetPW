# ProjetPW


Soit le contexte suivant:
un club sportif possède des licenciés et les licenciés appartiennent à des catégories (une catégorie par licencié).
Un licencié possède un numéro de licence (unique), un nom, un prénom, et un contact. Un contact possède un nom, 
un prénom, un email, un numéro de tel.
Une catégorie possède un nom et un code raccourci - par exemple, les moins de 12 ans sont appelés les M12 (code 
raccourci).
Les éducateurs sont des licenciés et possède en plus un email et un mot de passe. Certains educateurs sont des 
administrateurs.

Partie 1: PHP DAO/MVC

1)Vous devrez coder les classes categorie, licencié, contact et éducateur.
Vous devrez réaliser une mini application backend en PHP objet avec MVC et DAO qui permet de :
2)créer/modifier/supprimer une catégorie /lister les categories
3)créer/modifier/supprimer un licencié /lister les licenciés
4)créer/modifier/supprimer un licencié /lister les educateurs
5)créer/modifier/supprimer un contact d'un licencié
6)Cette partie de l'application est accessible via une authentification via email et mot de passe aux seuls éducateurs 
qui sont administrateurs.
7)faire de l'import/export des licenciés

Voici ci dessous les liens pour les videos

Partie 1 : 

https://drive.google.com/file/d/1LCyuac4qT98WotdDitkbyiKGItNqS9dC/view?usp=drivesdk

Partie 2: Symfony

Vous devrez réaliser la partie front end de cette application, à savoir que les éducateurs peuvent se connecter (8) à 
cette application pour :
1) visualiser la liste des licenciés d'une catégorie
2) visualiser la liste des contacts d'une catégorie
3) visualiser la liste des mails envoyés aux autres éducateurs/supprimer un mail envoyé
4) visualiser la liste des mails envoyés aux contacts d'un ou plusieurs catégories/supprimer un mail envoyé
5) ecrire un mail aux autres éducateurs
6) ecrire un mail aux contacts d'une ou plusieurs catégories
7)vous aurez donc besoin à minima en supplément des classes suivantes : 
mailEdu avec comme attributs: date d'envoi, objet, message, la collection des educateurs auquel ce message était 
destiné.
mailContact avec comme attributs: date d'envoi, objet, message, la collection des licenciés (en fait leur contact) 
auquel ce message était destiné.
