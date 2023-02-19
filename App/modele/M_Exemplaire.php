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
    // public static function afficherLesJeuxNonCommande()
    // {
    //    $req = "SELECT exemplaires.id, commandes.id, commandes.client_id 
    //    FROM commandes 
    //    LEFT JOIN lignes_commande ON lignes_commande.commande_id=commandes.id 
    //    LEFT JOIN exemplaires ON lignes_commande.exemplaire_id=exemplaires.id 
    //    WHERE client_id IS NOT NULL";
    //    $res = AccesDonnees::query($req);
    //    $lesLignes = $res->fetchAll();
    //    return $lesLignes;
    // }
}
