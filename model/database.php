<?php

require_once __DIR__ . '/../config/parameters.php';

// Création de la connexion à la BDD
$connection = new PDO("mysql:dbname=" . $param['dbname'] . ";host=" . $param['host'], $param['user'], $param['password']);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$connection->exec("SET names utf8");
$connection->exec("SET lc_time_names = 'fr_FR'");

function getAllProduits() {
    global $connection;
    
    $query = "
        SELECT
            produit.id,
            produit.nom,
            produit.image,
            produit.description,
            sport.libelle AS sport,
            categorie.libelle AS categorie
        FROM produit
        INNER JOIN sport ON sport.id = produit.sport_id
        LEFT JOIN categorie ON categorie.id = produit.categorie_id
    ";
    
    $stmt = $connection->prepare($query);
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