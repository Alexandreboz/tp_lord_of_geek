<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND categorie_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * permet d'afficher tous les jeux encore disponible
     * etat passé en argument
     *
     * @param [type] $idEtat
     * @return void
     */
    public static function trouveLesJeuxDeEtat($idEtat) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND etat_id = :id ";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idEtat, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * permet d'afficher tous les jeux encore disponible
     *console passé en argument
     * @param [type] $idConsole
     * @return void
     */
    public static function trouveLesJeuxDeConsole($idConsole) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition 
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND console_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idConsole, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * permet d'afficher tous les jeux encore disponible
     *édition passé en argument
     * @param [type] $idEdition
     * @return void
     */
    public static function trouveLesJeuxDeEdition($idEdition) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition 
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND edition_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idEdition, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * permet d'afficher tous les jeux encore disponible
     *licence passé en argument
     * @param [type] $idLicence
     * @return void
     */
    public static function trouveLesJeuxDeLicence($idLicence) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition  
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND licences.id = :id;";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idLicence, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * permet d'afficher tous les jeux encore disponible
     *exemplaire passé en argument
     * @param [type] $idExemplaire
     * @return void
     */
    public static function trouveToutLesJeux($idExemplaire) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition  
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND exemplaires.id = :id;";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idExemplaire, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
/**
 * permet d'afficher tous les jeux encore disponible
 *année passé en argument
 * @param [type] $idAnnee
 * @return void
 */
    public static function trouveToutesLesAnnees($idAnnee) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition  
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND exemplaires.id = :id;";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idAnnee, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux)
    {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT exemplaires.*
                FROM exemplaires 
                WHERE exemplaires.id = :unIdProduit";
                $pdo = AccesDonnees::getPdo();
                $stmt = $pdo->prepare($req);
                $stmt->bindParam(':unIdProduit', $unIdProduit, PDO::PARAM_INT);
                $stmt->execute();
                $unProduit = $stmt->fetch(PDO::FETCH_ASSOC);

                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
 /**
  * trouve un jeu en fonction de son id pour l'afficher dans la page v_once.php s'il en reste de disponible
  *
  * @param [type] $idJeu
  * @return void
  */
    public static function trouveUnJeu($idJeu)
    {
        $req = "SELECT exemplaires.*, categories.nom_categorie, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN categories on exemplaires.categorie_id = categories.id
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND exemplaires.id = :idJeu";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idJeu', $idJeu, PDO::PARAM_INT);
        $stmt->execute();
        $leJeu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $leJeu;
    }

    /**
     * trouve un jeu de la même console que le jeu afficher dans la page v_once.php s'il en reste de disponible
     *
     * @param [type] $idJeu
     * @return void
     */
    public static function trouveMemeConsole($idJeu)
    {
        $req = "SELECT exemplaires.*, categories.nom_categorie, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN categories on categorie_id = categories.id
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND exemplaires.id != :idJeu AND exemplaires.console_id = (
        SELECT console_id FROM exemplaires WHERE id = :idJeu)";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idJeu', $idJeu, PDO::PARAM_INT);
        $stmt->execute();
        $leJeu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $leJeu;
    }

    /**
     * trouve un jeu de la même catégorie que le jeu affiché dans la page v_once.php s'il en reste de disponible
     *
     * @param [type] $idJeu
     * @return void
     */
    public static function trouveMemeCategorie($idJeu)
    {
        $req = "SELECT exemplaires.*, categories.nom_categorie, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN categories on categorie_id = categories.id
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        AND exemplaires.id != :idJeu AND exemplaires.categorie_id = (
        SELECT categorie_id FROM exemplaires WHERE id = :idJeu)";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idJeu', $idJeu, PDO::PARAM_INT);
        $stmt->execute();
        $leJeu = $stmt->fetch(PDO::FETCH_ASSOC);
        return $leJeu;
    }
}
