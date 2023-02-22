<section id="visite">
    <aside id="categories">
        <h3>Par Catégorie</h3>
        <ul class="categories">
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom_categorie'];
                ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirJeux><?php echo $libCategorie ?></a>
                </li>
                <?php
            }
            ?>
            </ul>
            <h3>Par Etat</h3>
            <ul class="etat">
            <?php
            foreach ($lesEtats as $unEtat) {
                $idEtat = $unEtat['id'];
                $libEtat = $unEtat['nom_etat'];
                ?>
                <li>
                    <a href=index.php?uc=visite&etat=<?php echo $idEtat ?>&action=voirEtat><?php echo ucfirst($libEtat) ?></a>
                </li>
                
                <?php
            }
            ?>
            </ul>
             <h3>Par Console</h3>
                <ul class="console">
            <?php
            foreach ($lesConsoles as $uneConsole) {
                $idConsole = $uneConsole['id'];
                $libConsole = $uneConsole['nom_console'];
                ?>
                
                <li>
                    <a href=index.php?uc=visite&console=<?php echo $idConsole ?>&action=voirConsole><?php echo ucfirst($libConsole) ?></a>
                </li>
                
                <?php
            }
            ?>
            </ul>
            <h3>Par Licence</h3>
                <ul class="licence">
            <?php
            foreach ($lesLicences as $uneLicence) {
                $idLicence = $uneLicence['id'];
                $libLicence = $uneLicence['nom_licence'];
                ?>
                
                <li>
                    <a href=index.php?uc=visite&licence=<?php echo $idLicence ?>&action=voirLicence><?php echo ucfirst($libLicence) ?></a>
                </li>
                
                
                <?php
            }
            ?>
            </ul>
            <h3>Par édition</h3>
                <ul class="edition">
            <?php
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

        </ul>
    </aside>
    <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $description = $unJeu['descriptions'];
            $image = $unJeu['image'];
            ?>
            <div>
                <a href="index.php?uc=consulterJeu&id=<?= $id ?>"><article style="margin-top: 20px; margin-left: 20px; display:block">
                    <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                <p><?= $description ?></p></article></a>
            </div>
            <?php
        }
        ?>
    </section>
</section>
