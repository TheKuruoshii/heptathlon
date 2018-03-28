<?php

require_once __DIR__ . '/../config/parameters.php';

// Création de la connexion à la BDD
$connection = new PDO("mysql:dbname=" . $param['dbname'] . ";host=" . $param['host'], $param['user'], $param['password']);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$connection->exec("SET names utf8");
$connection->exec("SET lc_time_names = 'fr_FR'");

function getAllProduits(int $limite = 9999) {
    global $connection;
    
    $query = "
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
        ORDER BY produit.date_ajout DESC
        LIMIT :limite
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':limite', $limite);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getProduit($id) {
    global $connection;
    
    $query = "
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
        INNER JOIN sport ON sport.id = produit.sport_id
        LEFT JOIN categorie ON categorie.id = produit.categorie_id
        WHERE produit.id = :id
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function getAllCategorie(): array {
    global $connection;
    
    $query = "
        SELECT *
        FROM categorie
        ORDER BY libelle DESC
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getCategorie(int $id): array {
    global $connection;
    
    $query = "
        SELECT *
        FROM categorie
        WHERE id = :id
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function getProduitByCategorie($id) {
    global $connection;
    
    $query = "
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
        WHERE produit.categorie_id = :id;
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getMagasinByProduit($id) {
    global $connection;
    
    $query = "
        SELECT 
            magasin.id,
            magasin.nom,
            magasin.mail,
            magasin.telephone
        FROM magasin
        INNER JOIN magasin_has_produit AS mhp ON mhp.magasin_id = magasin.id
        WHERE mhp.produit_id = :id
        ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getAllSports(): array {
    global $connection;
    
    $query = "
        SELECT
            sport.id,
            sport.libelle
        FROM sport
        ORDER BY libelle;
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getProduitBySport($id) {
    global $connection;
    
    $query = "
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
        WHERE produit.sport_id = :id;
    ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}