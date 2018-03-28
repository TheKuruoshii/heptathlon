USE dc1_heptathlon;

SELECT *
FROM categorie
ORDER BY libelle DESC;

SELECT 
magasin.id,
magasin.nom,
magasin.mail,
magasin.telephone
FROM magasin
INNER JOIN magasin_has_produit AS mhp ON mhp.magasin_id = magasin.id
WHERE mhp.produit_id = 2;

SELECT
produit.id,
produit.nom,
produit.image,
produit.description,
produit.prix,
produit.date_ajout,
sport.libelle AS sport, 
categorie.libelle AS categorie
FROM produit
INNER JOIN sport ON produit.sport_id = sport.id
LEFT JOIN categorie ON produit.categorie_id = categorie.id
WHERE produit.sport_id = 6;

SELECT
sport.id,
sport.libelle
FROM sport
ORDER BY libelle;