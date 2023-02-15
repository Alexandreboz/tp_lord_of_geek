<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Licences {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesLicences() {
        $req = "SELECT * FROM licences";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}
