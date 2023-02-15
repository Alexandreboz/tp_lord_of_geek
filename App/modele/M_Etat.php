<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Etat {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesEtat() {
        $req = "SELECT * FROM etat_jeu";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}

