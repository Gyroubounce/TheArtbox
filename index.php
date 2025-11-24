<!--insertion du header depuis la page en php-->

      <?php require_once(__DIR__ . '/header.php'); ?>
   
  <!--création de la galerie d'image avec le tableau créer dans oeuvres.php-->

    <main>
        <div id="liste-oeuvres">
        <?php require_once(__DIR__ .'/oeuvres.php')?>
            <?php foreach ($oeuvres as $oeuvre) : ?>
                <article class="oeuvre">
                    <a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">                   
                        <div><img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['title']; ?>"></div>
                        <h2><?php echo $oeuvre['title']; ?></h2>
                        <p class="description"><?php echo $oeuvre['author']; ?></p>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

   <!--insertion du footer depuis la page en php-->

        <?php require_once(__DIR__ . '/footer.php'); ?>
