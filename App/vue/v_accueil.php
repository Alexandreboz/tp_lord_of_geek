<section>
    <h1>
        Lord Of Geek
    </h1>
    <h2>
        le prince des jeux sur internet
    </h2>
</section>
<main style="display: flex; flex-direction:row; gap: 50px; justify-content:space-evenly">
   
        <section style="display: block; gap: 50px">
      <h3>Tous les jeux disponibles par ordre du plus récent au plus ancien ajouté dans la collection</h3>   
            <?php
            include 'App/controleur/c_consultation.php';
                foreach ($Tout as $plusieurs) {
                    $idExemplaire = $plusieurs['id'];
                    $libExemplaire = $plusieurs['descriptions'];
                    $prix = $plusieurs['prix'];
                    $image = $plusieurs['image'];
                    $annee = $plusieurs['annee_sortie'];
    
                    ?>
                    <article style="display:block; gap:20px" >
                            <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $libExemplaire; ?>" width="300px" height="250px"/>
                            <p><?= $libExemplaire."<br>" ?>
                            <?= "Prix :   $prix  Euros <br> Année de sortie : $annee"?>
                            </p>
                        </article>
                    <?php
                }
                ?>
        </section>
        
        <section style="display: block; gap: 50px">
        <h3>Tous les jeux disponibles du plus ancien au plus vieux en fonction de leur date de sortie</h3>
            <?php
                foreach ($Annee as $plusieurs) {
                    $idExemplaire = $plusieurs['id'];
                    $libExemplaire = $plusieurs['descriptions'];
                    $prix = $plusieurs['prix'];
                    $image = $plusieurs['image'];
                    $annee = $plusieurs['annee_sortie'];
    
                    ?>
                    <article style="display:block; gap:20px">
                            <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $libExemplaire; ?>" width="300px" height="250px"/>
                            <p><?= $libExemplaire."<br>" ?>
                            <?= "Prix :   $prix  Euros <br> Année de sortie : $annee"?>
                            </p>
                        </article>
                    <?php
                }
                ?>
        </section>
</main>