<section id="visite">
    <aside id="categories">
        <ul >
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
                ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirJeux><?php echo $libCategorie ?></a>
                </li>
                <?php
            }
            foreach ($lesEtats as $unEtat) {
                $idEtat = $unEtat['id'];
                $libEtat = $unEtat['nom_etat'];
                ?>
                <li>
                    <a href=index.php?uc=visite&etat=<?php echo $idEtat ?>&action=voirEtat><?php echo ucfirst($libEtat) ?></a>
                </li>
                <?php
            }
            foreach ($lesConsoles as $uneConsole) {
                $idConsole = $uneConsole['id'];
                $libConsole = $uneConsole['nom_console'];
                ?>
                <li>
                    <a href=index.php?uc=visite&console=<?php echo $idConsole ?>&action=voirConsole><?php echo ucfirst($libConsole) ?></a>
                </li>
                <?php
            }
            foreach ($lesLicences as $uneLicence) {
                $idLicence = $uneLicence['id'];
                $libLicence = $uneLicence['nom_licence'];
                ?>
                <li>
                    <a href=index.php?uc=visite&licence=<?php echo $idLicence ?>&action=voirLicence><?php echo ucfirst($libLicence) ?></a>
                </li>
                <?php
            }
            foreach ($lesEditions as $uneEdition) {
                $idEdition = $uneEdition['id'];
                $libEdition = $uneEdition['nom_edition'];
                ?>
                <li>
                    <a href=index.php?uc=visite&edition=<?php echo $idEdition ?>&action=voirEdition><?php echo ucfirst($libEdition) ?></a>
                </li>
                <?php
            }
            ?>

        </ul>
    </aside>
    <section  id="jeux">
        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $description = $unJeu['descriptions'];
            $prix = $unJeu['prix'];
            $image = $unJeu['image'];
            $annee = $unJeu['annee_sortie'];
            $etat = $unJeu['nom_etat'];
            $console = $unJeu['nom_console'];
            $licence = $unJeu['nom_licence'];
            $edition = $unJeu['nom_edition']; 
            ?>
            <article>
                <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>"/>
                <p><?= $description ?></p>
                <p><?= "Prix :   $prix  Euros <br> Année de sortie : $annee<br> Etat du l'exemplaire : $etat<br>Sur la console : $console<br>La licence est : $licence<br>L'édition du jeu est : $edition"?>
                    <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                        <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                    </a>
                </p>
            </article>
            <?php
        }
        ?>
    </section>
</section>
