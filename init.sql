--region    -- 1. Données de référence

INSERT INTO type_quantite (id, libelle, code)
VALUES
 (1,'Gramme','GRAMME')
,(2,'Kilogramme','KILOGRAMME')
,(3,'Litre','LITRE')
,(4,'Centilitre','CENTILITRE')
,(5,'Cuillère à café','CUILLERE_CAFE')
,(6,'Cuillère à soupe','CUILLERE_SOUPE')
,(7,'Pincée','PINCEE')
,(8,'Feuille','FEUILLE')
,(9,'Tasse','TASSE')
;
ALTER SEQUENCE type_quantite_id_seq RESTART WITH 9;

INSERT INTO ingredient (id, nom)
VALUES
 (1,'Basilic')
,(2,'Beurre')
,(3,'Bouillon de bœuf')
,(4,'Champignon de Paris')
,(5,'Chocolat noir')
,(6,'Crème fraîche')
,(7,'Farine')
,(8,'Filet de bœuf')
,(9,'Huile d''olive')
,(10,'Maïzena')
,(11,'Mozzarella')
,(12,'Œuf')
,(13,'Poivre')
,(14,'Sel')
,(15,'Sucre en poudre')
,(16,'Tomate')
,(17,'Vinaigre balsamique')
;
ALTER SEQUENCE ingredient_id_seq RESTART WITH 17;

--endregion -- 1. Données de référence

--region    -- 2. Données de l'application

INSERT INTO recette (id, nom, temps_preparation, temps_cuisson)
VALUES
 (1,'Salade tomates mozzarella',10,0)
,(2,'Filet de bœuf aux champignons',15,15)
,(3,'Mousse au chocolat',20,5)
;
ALTER SEQUENCE recette_id_seq RESTART WITH 3;

INSERT INTO ingredient_recette (id, recette_id, ingredient_id, quantite, type_quantite_id)
VALUES
 (1,1,16,4,NULL)
,(2,1,11,2,NULL)
,(3,1,9,2,6)
,(4,1,17,1,6)
,(5,1,1,8,8)
,(6,1,13,1,7)
,(7,1,14,1,7)

,(8,2,8,2,NULL)
,(9,2,4,6,NULL)
,(10,2,2,30,1)
,(11,2,3,1,9)
,(12,2,6,1,6)
,(13,2,10,1,5)
,(14,2,13,1,7)
,(15,2,14,1,7)

,(16,3,5,225,1)
,(17,3,2,70,1)
,(18,3,12,5,NULL)
,(19,3,15,1,6)
,(20,3,14,1,7)
;
ALTER SEQUENCE ingredient_recette_id_seq RESTART WITH 20;

--endregion -- 2. Données de l'application
