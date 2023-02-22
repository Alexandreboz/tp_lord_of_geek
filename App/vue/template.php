<!DOCTYPE html>
<!--
Prototype de Lord Of Geek (LOG)
-->
<html>
    <head>
        <title>Lord Of Geek 2022</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/cssGeneral.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <!-- Images En-tête -->
            <img src="public/images/logo.png" alt="Logo Lord Of Geek" />
            <!--  Menu haut-->
            <nav  id="menu">
                <ul>
                    <li><a href="index.php?uc=accueil"> Accueil </a></li>
                    <li><a href="index.php?uc=visite&action=voirCategories"> Voir le catalogue de jeux </a></li>
                    <li><a href="index.php?uc=panier&action=voirPanier"> Voir son panier </a></li>
                    <?php
                if (empty($clientSession)) {
                    echo "<li><a href = 'index.php?uc=authentification'> Connexion </a></li>";
                    echo "<li><a href = 'index.php?uc=inscription'> Inscription </a></li>";
                } else {
                    echo "<li><a href = 'index.php?uc=compte'>Mon compte</a></li>";
                    echo "<li><a href='index.php?uc=authentification&action=logoutClient'> Se déconnecter </a></li>";
                }
                ?>
                </ul>
            </nav>

        </header>
        <main>
            <?php
            switch ($uc) {
                case 'accueil':
                    include 'App/vue/v_accueil.php';
                    break;
                case 'visite' :
                    include("App/vue/v_jeux.php");
                    break;
                case 'panier' :
                    include("App/vue/v_panier.php");
                    break;
                case 'inscription':
                    include("App/vue/v_inscription.php");
                    break;
                case 'consulterJeu':
                    include'App/modele/M_Exemplaire.php';
                    $idJeu = filter_input(INPUT_GET, 'id');
                    $lesJeux = M_Exemplaire::trouveUnJeu($idJeu);
                    $laConsole = M_Exemplaire::trouveMemeConsole($idJeu);
                    $laCategorie = M_Exemplaire::trouveMemeCategorie($idJeu);
                    include'App/vue/v_once.php';
                    break;
                case 'authentification':
                    include("App/vue/v_authentification.php");
                    break;
                case 'compte' :
                    include ("App/vue/v_compte.php");
                    break;
                default:
                    break;
            }
            ?>
        </main>
    </body>
</html>
