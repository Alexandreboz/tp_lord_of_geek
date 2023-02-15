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
        WHERE categorie_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesJeuxDeEtat($idEtat) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        WHERE etat_id = :id ";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idEtat, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesJeuxDeConsole($idConsole) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition 
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        WHERE console_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idConsole, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesJeuxDeEdition($idEdition) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition 
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        WHERE edition_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idEdition, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesJeuxDeLicence($idLicence) {
        $req = "SELECT exemplaires.*, etat_jeu.nom_etat, console.nom_console, licences.nom_licence, editions.nom_edition  
        FROM exemplaires
        JOIN editions ON exemplaires.edition_id = editions.id
        JOIN licences ON exemplaires.licences_id = licences.id
        JOIN console ON exemplaires.console_id = console.id
        JOIN etat_jeu ON exemplaires.etat_id = etat_jeu.id
        WHERE licences_id = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idLicence, PDO::PARAM_INT);
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

}
