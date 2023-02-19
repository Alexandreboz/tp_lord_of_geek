<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Tout {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesJeux() {
        $req = "SELECT * FROM exemplaires 
        LEFT JOIN lignes_commande ON lignes_commande.exemplaire_id=exemplaires.id 
        WHERE exemplaires.id NOT IN (SELECT exemplaire_id FROM lignes_commande WHERE exemplaire_id IS NOT NULL)
        ORDER BY exemplaires.id DESC";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
}
