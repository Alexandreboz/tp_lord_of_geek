<?php

class M_Client {

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

    public static function trouverClientParId($idClient) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = :id");
        $stmt->bindParam(":id", $idClient);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

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
    
    public static function changerInfoClient($id, $nom, $prenom, $adresse, $cp, $ville, $mail) {
        if($erreurs = static::estProfilValide($nom, $prenom, $adresse, $cp, $ville, $mail)) {
            return $erreurs;
        }
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("UPDATE clients SET nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, mail = :mail WHERE clients.id = :id");
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":adresse", $adresse);
        $stmt->bindParam(":cp", $cp);
        $stmt->bindParam(":ville", $ville);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }

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