
<!--et urilisation de la page oeuvres.php pour son tableau-->

        <?php require_once(__DIR__ . '/header.php'); ?>
        <?php require_once "bdd.php";

?>
        
<!--condition pour aller chercher la valeur de l'id de chaque tableau-->

        <?php
            $id = $_GET['id'] ?? null;
            $oeuvre = null;

            if ($id !== null) {
    // requête préparée pour éviter les injections SQL
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare("SELECT * FROM oeuvres WHERE Id = ?");
    $stmt->execute([$id]);
    $oeuvre = $stmt->fetch(PDO::FETCH_ASSOC);
}
        ?>

       
    <main>
        <article id="detail-oeuvre">
        <?php if ($oeuvre): ?>
            <div id="img-oeuvre">        
                <img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['title']; ?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?php echo $oeuvre['title']; ?></h1>
                <p class="description"><?php echo $oeuvre['author']; ?></p>
                <p class="description-complete"><?php echo $oeuvre['description']; ?></p>
            </div>
            <?php else: ?>
            <p>Œuvre non trouvée.</p>
        <?php endif; ?>
        </article>
    </main>

   <!--insertion du footer depuis la page en php-->

        <?php require_once(__DIR__ . '/footer.php'); ?>
    
