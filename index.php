<?php


/*


utilisateurs
-------------
id
pseudo
password



# INSERER DES VALEURS

INSERT INTO utilisateurs VALUES (12, 'L''Asterix', 'test');

# JE PRECISE LES COLONNES
INSERT INTO utilisateurs (pseudo, password) VALUES ('Hugo', 'pass');


# INSERER 2 LIGNES
INSERT INTO utilisateurs VALUES (12, 'Adrien', 'test'), (13, 'Adrien 2 ', 'test 2');


# LIRE LES LIGNES

SELECT id, pseudo FROM utilisateurs WHERE id = 4;

SELECT id, pseudo, password FROM utilisateurs WHERE id = 4;


CONDITIONS WHERE

OPERATEURS :
id = 4
id > 4
id >= 4
id <  4     strict inferieur
id <= 4      inferieur egal
id <> 4      différent

# * = toutes les colonnes
SELECT * FROM utilisateurs; # REQUETE DE BASE

SELECT id FROM utilisateurs WHERE pseudo = 'Arthur' AND password = 'test' OR pseudo = 'Josephine';


SELECT colonnnes
FROM ma_table
(WHERE condition_1 AND condition_2 OR condition_3 ...)
(ORDER BY )



SELECT id FROM utilisateurs WHERE pseudo = 'Arthur' ORDER BY password ASC ;

id
54		Arthur		aze
22		Arthur		bcd
14		Arthur		test
6		Arthur		vvv



# Décroissante : DESC
# Croissant : ASC

14
54
22
6

# SUPPRIMER DES LIGNES

DELETE FROM utilisateurs;
DELETE FROM utilisateurs WHERE id = 4;

# METTRE A JOUR DES LIGNES

UPDATE utilisateurs SET pseudo = 'Clement' WHERE id = 12;
UPDATE utilisateurs SET pseudo = 'Clement', password = 'RIENDUTOUT' WHERE id = 12;

# COMMENT FAIRE LORSQU'ON A PLUSIEURS TABLES


article
------------
id			INT
titre		VARCHAR(100)
contenu		TEXT
categorie_id		INT

categorie
------------------
id			INT
titre		VARCHAR(50)
couleur		VARCHAR(7)




article
-------------------
1		Bienvenue		Lorem ipsum... 				2
2		A propos		Lorem ipsum...				1
3		Blabla  		Lorem ipsum...				2

categorie
---------------
1		Dernières publis		#0186ab
2		Archives				#132456


Récupérez le titre des articles avec la couleur de leur catégorie


SELECT art.id AS article_id, cat.couleur AS couleur_categorie
FROM article art, categorie
WHERE art.categorie_id = categorie.id


article_id          couleur_categorie
1                   #132456
2                   #0186ab
3                   #132456


# OPERATEURS D'ENSEMBLE

COUNT   -> compte le nombre de lignes
SUM     -> fait la somme
AVG     -> fait la moyenne
MIN     -> calule le minimum
MAX     -> calule le maximum

Ex :

SELECT COUNT(titre) FROM CATEGORIE      ->  3
SELECT SUM(titre) FROM CATEGORIE        -> ERREUR
SELECT SUM(id) FROM CATEGORIE           -> 6

# REGROUPEMENTS

On peut effectuer des sous-ensembles dans une requete grâce à la clause GROUP BY. Pour chacune des différentes valeurs
de la colonne utilisée dans le GROUP BY, on aura une ligne en sortie.

	UTILISATEURS
id	    login	    password
1	    a	        test
2	    b	        test
3	    c	        test
4	    a	        test
5	    b	        test
6	    c	        test
7	    a	        test
8	    b	        test
9	    c	        toto
10	    a	        toto
11	    b	        toto
12	    c	        toto
13	    a	        toto
14	    b	        tutu
15	    c	        tutu
16	    a	        tutu
17	    b	        tutu
18	    c	        tutu
19	    a	        tutu
20	    b	        tutu
21	    c	        tutu
22	    a	        tutu
23	    b	        tutu
24	    c	        tutu


Si je veux compter le nombre d'utilisateurs par mot de passe, je suis obligé de faire un groupement sur la colonne "password"

SELECT xxx
FROM UTILISATEURS
GROUP BY password

J'aurais donc 3 sous-ensemble :

id	    login	    password
1	    a	        test
2	    b	        test
3	    c	        test
4	    a	        test
5	    b	        test
6	    c	        test
7	    a	        test
8	    b	        test
------------------------------------
9	    c	        toto
10	    a	        toto
11	    b	        toto
12	    c	        toto
13	    a	        toto
-------------------------------------
14	    b	        tutu
15	    c	        tutu
16	    a	        tutu
17	    b	        tutu
18	    c	        tutu
19	    a	        tutu
20	    b	        tutu
21	    c	        tutu
22	    a	        tutu
23	    b	        tutu
24	    c	        tutu

Chacun de ces sous ensemble sera représentée en sortie sous la forme d'une seule ligne.
Cela impose des contraintes sur ce que l'on va mettre dans la partie SELECT.
On ne peut récupérer que les colonnes qui ont tout le temps la meme valeur (ie la colonne utilisée dans la clause GROUP BY)
ou des résultats de fonction d'ensemble (ie COUNT, SUM, MIN, MAX, AVG)

Au final si je veux compter le nombre d'utilisateurs par mot de passe j'écris comme requête :

SELECT password, COUNT(*)
FROM UTILISATEURS
GROUP BY password

Ce qui me donne

password        count
test            8
toto            5
tutu            11

# POUR RECAPITULER :

article
------------
id			INT
titre		VARCHAR(100)
contenu		TEXT
categorie_id		INT

categorie
------------------
id			INT
titre		VARCHAR(50)
couleur		VARCHAR(7)


Si je veux récupérer le nombre d'article par titre de catégorie, je fais :

SELECT c.titre, COUNT(*)
FROM article a, categorie c
WHERE a.categorie_id = c.id
GROUP BY c.id
