<?php
include 'App/modele/M_categorie.php';
include 'App/modele/M_exemplaire.php';
include 'App/modele/M_Etat.php';
include 'App/modele/M_Console.php';
include 'App/modele/M_Licences.php';
include 'App/modele/M_Edition.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
switch ($action) {
    case 'voirJeux' :
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'voirEtat' :
        $etat = filter_input(INPUT_GET, 'etat');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeEtat($etat);
        break;
    case 'voirConsole' :
        $console = filter_input(INPUT_GET, 'console');
        $lesJeux = M_Exemplaire::trouveLesJeuxdeConsole($console);
        break;
    case 'voirLicence' :
        $licence = filter_input(INPUT_GET, 'licence');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeLicence($licence);
        break;
    case 'voirEdition' :
        $edition = filter_input(INPUT_GET, 'edition');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeEdition($edition);
        break;       
    case 'ajouterAuPanier' :
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    default:
        $lesJeux = [];
        break;
}
$lesCategories = M_Categorie::trouveLesCategories();
$lesEtats = M_Etat::trouveLesEtat();
$lesConsoles = M_Console::trouveLesConsole();
$lesLicences = M_Licences::trouveLesLicences();
$lesEditions = M_Edition::trouveLesEdition();