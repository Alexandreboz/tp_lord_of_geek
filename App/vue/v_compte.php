<h1>Les dernières commandes</h1>
<section id="compte">
    <article style="display: flex;">
                <?php foreach ($commandesClient as $commandes){
                $id = $commandes['id'];
                $description = $commandes['descriptions'];
                $prix = $commandes['prix'];
                $image = $commandes['image'];
                $annee = $commandes['annee_sortie'];
                $datecommande = $commandes['created_at'];
                ?>
                <article style="margin-top: 20px; margin-left: 20px;">
                    <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                    <p><?= $description ?></p>
                    <p><?= "Prix :   $prix  Euros <br> Année de sortie : $annee<br> Commandé le : $datecommande"?>
                    </p>
                </article>
                <?php
            }
            ?>
    </article>
        <form method="POST" action="index.php?uc=compte&action=changerProfil" style="width: 60vw;">
            <fieldset>
                <legend>Les informations du compte</legend>
                <p>
                    <label for="nom">Nom :</label>
                    <?= $clientSession['nom'] ?>
                </p>
                <p>
                    <label for="prenom">Prenom :</label>
                    <?= $clientSession['prenom'] ?>
                </p>
                <p>
                    <label for="ville">Adresse :</label>
                    <?= $clientSession['adresse'] ?>
                </p>
                <p>
                    <label for="cp">Code postal :</label>
                    <?= $clientSession['cp'] ?>
                </p>
                <p>
                    <label for="rue">Ville :</label>
                    <?= $clientSession['ville'] ?>
                </p>
                <p>
                    <label for="mail">Email :</label>
                    <?= $clientSession['mail'] ?>
                </p>
        </form>
</section>