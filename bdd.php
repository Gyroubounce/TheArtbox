<?php
// Paramètres de connexion
$host = "127.0.0.1";   // ou "localhost"
$dbname = "artbox";    // nom de ta base
$username = "root";    // par défaut dans Laragon
$password = "";        // mot de passe vide par défaut dans Laragon

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Options pour sécuriser et gérer les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
