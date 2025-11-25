<?php
require_once(__DIR__ . '/bdd.php'); // connexion à la base
$pdo = getPDOConnection();

if (
    empty($_POST['title'])
    || empty($_POST['author'])
    || empty($_POST['description'])
    || empty($_POST['image'])
    || strlen($_POST['description']) < 3
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
) {
    // Redirection si erreur
    header('Location: ajouter.php?erreur=true');
    exit;
} else {
    // Sécurisation des données
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $author = htmlspecialchars($_POST['author']);
    $image = htmlspecialchars($_POST['image']);

    // Insertion en base
    try {
        $requete = $pdo->prepare(
            "INSERT INTO oeuvres (image, title, author, description) VALUES (?, ?, ?, ?)"
        );
        $requete->execute([$image, $title, $author, $description]);

        // Redirection après succès
          // Récupérer l'Id généré automatiquement
        $lastId = $pdo->lastInsertId();

        // Rediriger vers la fiche détail de l'œuvre ou header('Location: index.php?success=true');
        header('Location: oeuvre.php?id=' . $lastId);
        exit;
    } catch (PDOException $e) {
        echo "❌ Erreur lors de l'insertion : " . $e->getMessage();
    }
}
