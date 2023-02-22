<?php

class M_Client {
/**
 * cette fonction créée un client et insert dans la table clients les données saisie lors de l'inscription
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @param [type] $nom
 * @param [type] $prenom
 * @param [type] $adresse
 * @param [type] $cp
 * @param [type] $ville
 * @param [type] $mail
 * @return void
 */
    public static function creerClient($identifiant, $mdp, $nom, $prenom, $adresse, $cp, $ville, $mail) {
        if($erreurs = static::estValide($identifiant, $mdp, $nom, $prenom, $adresse, $cp, $ville, $mail)){
            return $erreurs;
        };

        $pdo = AccesDonnees::getPdo();
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO clients(identifiant, mdp, nom, prenom, adresse, cp, ville, mail) VALUES (:identifiant, :mdp, :nom, :prenom, :adresse, :cp, :ville, :mail)');
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    }
    
    // public static function lastClient(){
    //     $idClient = AccesDonnees::getPdo()->lastInsertId();
    //     return $idClient;
    // }
/**
 * cette fonction permet de trouver un client en passant par son Id
 *
 * @param [type] $idClient
 * @return void
 */
    public static function trouverClientParId($idClient) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = :id");
        $stmt->bindParam(":id", $idClient);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }
/**
 * cette fonction permet l'authentification en trouvant un client par son identifiant et son mot de passe
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @return void
 */
    public static function trouverClientParIdentifiantEtMDP($identifiant, $mdp) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE identifiant = :identifiant");
        $stmt->bindParam(":identifiant", $identifiant);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client && password_verify($mdp, $client["mdp"])) {
            return $client;
        }
        return false;
    }
    
/**
 * cette fonction permet de valider l'inscription du client s'il n'a pas fait d'erreur lors de la saisie des informations demandées
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @param [type] $nom
 * @param [type] $prenom
 * @param [type] $adresse
 * @param [type] $cp
 * @param [type] $ville
 * @param [type] $mail
 * @return void
 */
    public static function estValide($identifiant, $mdp, $nom, $prenom, $adresse, $cp, $ville, $mail) {
        $erreurs = [];
        if ($identifiant == "") {
            $erreurs[] = "Il faut saisir le champ identifiant";
        }
        if ($mdp == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        }
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        }
        if ($adresse == "") {
            $erreurs[] = "Il faut saisir le champ adresse";
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


    public static function estProfilValide($nom, $prenom, $adresse, $cp, $ville, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        }
        if ($adresse == "") {
            $erreurs[] = "Il faut saisir le champ adresse";
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