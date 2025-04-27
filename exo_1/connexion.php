<?php
$host = '127.0.0.1'; // Adresse du serveur
$db = 'catalogue_livres'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur (par défaut sur Laragon)
$pass = ''; // Mot de passe (vide par défaut sur Laragon)
$charset = 'utf8mb4'; // Jeu de caractères

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}