


INSERT INTO type_garniture
(id, nom)
VALUES 	(1,'Crudité'),
		(2,'Viande'),
		(3,'Poisson'),
		(4,'Fromage'),
		(5,'Huiles et Sauces'),
		(6,'Autre')


INSERT INTO garnitures
(id, type_garniture_id, nom, prix)
VALUES 	(1, 1, 'Tomates', 0.3),
		(2, 1, 'Salade', 0.3),
		(3, 2, 'Jambon', 0.5),
		(4, 4, 'Fromage', 0.4),
		(5, 6,'Oeuf dur', 0.35),
		(6, 4, 'Fromage de chèvre',0.5),
		(7, 1, 'Avocat',0.4),
		(8, 2, 'Rosbif',0.75),
		(9, 2, 'Dinde',0.75),
		(10, 2, 'Poulet curry',0.5),
		(11, 3, 'Saumon fumé',1),
		(12, 3, 'Thon',0.5),
		(13, 2, 'Poulet andalouse',0.5),
		(14, 5, 'Huile d\'olive',0.2),
		(15, 1, 'Carottes rapées', 0.3),
		(16, 1, 'Mayonnaise', 0.4);


INSERT INTO sandwich
(id, nom, description)
VALUES 	(1, 'Jambon', "Un sandwich au Jambon"),
		(2, 'Fromage', "Un sandwich au Fromage"),
		(3, 'Rosbif', "Un sandwich au Rosbid avec huile d'olive, poivre et sel" ),
		(4, 'Jambon-Fromage', "Un sandwich au Jambon-Fromage"),
		(5,'Club',"Un Club savoureux aux tomates juteuses"),
		(6, 'Fromager du chef',"Un sandwich au double fromage."),
		(7, 'Oeuf-Crudité',"Un sandwich aux crudités avec de l'oeuf à la place de la viande."),
		(8, 'Saumon Gourmet',"Un sandwich au saumon, avec de la salade de l'oeuf et des tomates."),
		(9, 'Dinde',"Un sandwich à la dinde et à l'huile d'olive. "),
		(10, 'Poulet curry',"Un sandwich au Poulet curry "),
		(11, 'Saumon fumé',"Un sandwich au Saumon fumé"),
		(12, 'Thon mayonnaise',"Un sandwich au Thon mayonnaise (maison s'il vous plait !)"),
		(13, 'Poulet andalouse',"Un sandwich au Poulet andalouse"),
		(14, 'Carnivore Scandaleux',"Un sandwich qui regroupe Jambon, Rosbif et Dinde. Le tout agrémenté d'un filet d'huile d'olive. "),
		(15, 'Vegefull', "Un sandwich Vegetarien avec toutes nos crudités disponibles ");


INSERT INTO garnitures_sandwich
(sandwich_id, garniture_id)
VALUES 	(1, 3),
		(2, 4),
		(3, 8),
		(3, 14),
		(4, 3),
		(4, 4),

		(5, 3),
		(5, 2),
		(5, 1),
		(5, 16),
		(5, 3),
		(6, 4),
		(6, 6),
		(7, 1),
		(7, 2),
		(7, 5),
		(7, 7),
		(8, 11),
		(8, 1),
		(8, 2),
		(8, 5),
		(9, 9),
		(9, 14),
		(10, 10),
		(11, 11),
		(12, 12),
		(12, 16),
		(13, 13),
		(14, 3),
		(14, 8),
		(14, 9),
		(14, 14),
		(15, 7),
		(15, 2),
		(15, 1),
		(15, 5);