INSERT INTO comment
(id, nom)
VALUES
( 1 , 'Bouche à oreille'),
( 2 , 'Site web' ),
( 3 , 'Est passé à proximité de l\'établissement' ),
( 4 , 'Autre' );


INSERT INTO personnes
(id, nom, prenom ,date_naissance, sexe, deleted, email, comment_id)
VALUES 	(1,'Inghels', 'Xavier', '1992-12-02', 'Homme', 0, 'xavier.inghels@gmail.com', 3),
		(2,'Général', 'Administratueur', '1970-01-01', 'Homme', 0, 'contact@sandwicherie.com', 3);


INSERT INTO membres
(personnes_id, login , password, token, connecte, newsletter, date_inscription, banned )
VALUES 	(1, 'NoxWorld', 'NoxWorld', NULL, 0, 0, NOW(), 0),
		(2, 'admin', 'admin', NULL, 0 ,0, NOW(), 0);


INSERT INTO entites
(id,nom)
VALUES 	(1, 'Personnes + adresses & téléphones'),
		(2, 'Membres'),
		(3, 'Permissions'),
		(4, 'Garnitures'),
		(5, 'Catalogue de Sandwich'),
		(6, 'Sandwich');


INSERT INTO permissions
(permission, entites_id, membres_personnes_id)
VALUES 	(b'1111', '1', '1'),
		(b'1111', '2', '1'),
		(b'1111', '3', '1'),
		(b'1111', '4', '1'),
		(b'1111', '5', '1')
		(b'1111', '6', '1')

		(b'1111', '1', '2'),
		(b'1111', '2', '2'),
		(b'1111', '3', '2'),
		(b'1111', '4', '2'),
		(b'1111', '5', '2'),
		(b'1111', '6', '2');




