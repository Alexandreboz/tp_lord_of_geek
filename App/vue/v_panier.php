<section>
    <img src="public/images/panier.gif"	alt="Panier" title="panier"/>
    <?php
    foreach ($lesJeuxDuPanier as $unJeu) {
        $id = $unJeu['id'];
        $description = $unJeu['descriptions'];
        $image = $unJeu['image'];
        $prix = $unJeu['prix'];
        ?>
        <p>
            <img src="public/images/jeux/<?php echo $image ?>" alt=image width=100 height=100 />
            <?php
            echo $description . "($prix Euros)";
            ?>	
            <a href="index.php?uc=panier&jeu=<?php echo $id ?>&action=supprimerUnJeu" onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">
                <img src="public/images/retirerpanier.png" TITLE="Retirer du panier" >
            </a>
        </p>
        <?php
    }
    ?>

<?php 
    if (isset($clientSession['id'])) {
    echo "<a href=index.php?uc=commander&action=passerCommande&idClient=" . $clientSession['id'] . ">";
    echo '<img src="public/images/commander.jpg" title="Passer commande" >';
    echo "</a>";
    } else {
        echo "<p><strong>Vous devez vous connecter ou vous inscrire pour commander.</p>";
        echo "<a href=index.php?uc=authentification>Se connecter</a>";
        echo "<br><br>";
        echo "<a href=index.php?uc=inscription>S'inscrire</a>";
    }
    ?>
    <br>
</section>
