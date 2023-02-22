<main style="display: flex; flex-direction:column; justify-content:center; align-items:center">
    <section>
        <?php
                $id = $lesJeux['id'];
                $description = $lesJeux['descriptions'];
                $prix = $lesJeux['prix'];
                $image = $lesJeux['image'];
                $annee = $lesJeux['annee_sortie'];
                $etat = $lesJeux['nom_etat'];
                $console = $lesJeux['nom_console'];
                $licence = $lesJeux['nom_licence'];
                $edition = $lesJeux['nom_edition'];
                $categorie = $lesJeux['nom_categorie']
    ?>
                <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                    <p><?= $description ?></p>
                    <p><?= "Prix :   $prix  Euros <br> Année de sortie : $annee<br> Etat du l'exemplaire : $etat<br>Sur la console : $console<br>La licence est : $licence<br>L'édition du jeu est : $edition"?>
                    <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                            <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                        </a>
    </section>
    <section style="display: flex; justify-content:space-evenly; gap:200px">
        <div>
        <?php
                   if ($laConsole) {
                    $id = $laConsole['id'];
                    $description = $laConsole['descriptions'];
                    $prix = $laConsole['prix'];
                    $image = $laConsole['image'];
                    $annee = $laConsole['annee_sortie'];
                    ?>
                        <p>Vous pourriez être intéressé par cet autre jeu sur <?= $console?></p>
                        <a href="index.php?uc=consulterJeu&id=<?= $id ?>"><article style="margin-top: 20px; margin-left: 20px; display:block">
                            <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                        <p><?= $description ?></p></article></a>
                    <?php
                } 
                ?></div>
                <div>
        <?php
                if ($laCategorie) {
                    $id = $laCategorie['id'];
                    $description = $laCategorie['descriptions'];
                    $image = $laCategorie['image'];
                    ?>
                        <p>Vous pourriez être intéressé par cet autre jeu de la catégorie <?=$categorie?></p>
                        <a href="index.php?uc=consulterJeu&id=<?= $id ?>"><article style="margin-top: 20px; margin-left: 20px; display:block">
                            <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                        <p><?= $description ?></p></article></a>
                    <?php
                } 
                ?>
                </div>
    </section>
</main>