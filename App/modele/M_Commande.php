<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    // public static function creerCommande($nom, $rue, $cp, $ville, $mail, $listJeux) {
    //     $reqClient = "insert into clients(nomPrenom, adresseRueClient, cpClient, villeClient, mailClient) values ('$nom','$rue','$cp','$ville','$mail')";
    //     $res = AccesDonnees::exec($reqClient);
    //     $idClient = AccesDonnees::getPdo()->lastInsertId();

    //     $reqCommande ="insert into commandes(client_id) values($idClient)";
    //     $res = AccesDonnees::exec($reqCommande);
    //     $idCommande = AccesDonnees::getPdo()->lastInsertId();
    public static function creerCommande($idClient, $listJeux) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("INSERT INTO commandes(created_at, client_id) VALUES (NOW(), :idClient)");
        $stmt->bindParam(":idClient", $idClient);
        $stmt->execute();

        $idCommande = AccesDonnees::getPdo()->lastInsertId();

        foreach ($listJeux as $jeu) {
            // $req = "insert into lignes_commande(commande_id, exemplaire_id) values ('$idCommande','$jeu')";
            // $res = AccesDonnees::exec($req);
            // $idLignes = AccesDonnees::getPdo()->lastInsertId();
            $pdo = AccesDonnees::getPdo();
            $stmt = $pdo->prepare("INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES (:idCommande, :jeu)");
            $stmt->bindParam(":idCommande", $idCommande);
            $stmt->bindParam(":jeu", $jeu);
            $stmt->execute();
        }
    }
    public static function afficherCommandes($idClient) {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare("SELECT exemplaires.*, commandes.*, clients.*
        FROM clients
        JOIN commandes ON commandes.client_id = clients.id
        JOIN lignes_commande ON lignes_commande.commande_id = commandes.id
        JOIN exemplaires ON exemplaires.id = lignes_commande.exemplaire_id
        WHERE clients.id = :clientId
        ORDER BY commandes.id DESC");
        $stmt->bindParam(":clientId", $idClient);
        $stmt->execute();
        $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesCommandes;
    }
    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }

}
