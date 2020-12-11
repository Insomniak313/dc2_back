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


categorie
---------------
1		Dernières publis		#0186ab
2		Archives				#132456


Récupérez le titre des articles avec la couleur de leur catégorie


SELECT art.id AS article_id FROM article art, categorie WHERE art.categorie_id = categorie.id


article_id
1
2
