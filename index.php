<?php 
// insertion du header
require_once(__DIR__ . '/header.php'); 

// connexion à la base
require_once(__DIR__ . '/bdd.php');
$pdo = getPDOConnection();
// requête pour récupérer les oeuvres
$stmt = $pdo->query("SELECT * FROM oeuvres");
$oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <div id="liste-oeuvres">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?php echo $oeuvre['Id']; ?>">                   
                    <div>
                        <img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['title']; ?>">
                    </div>
                    <h2><?php echo $oeuvre['title']; ?></h2>
                    <p class="description"><?php echo $oeuvre['author']; ?></p>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</main>

<?php 
// insertion du footer
require_once(__DIR__ . '/footer.php'); 
?>
