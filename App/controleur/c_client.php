<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'creerClient' :
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $adresse = filter_input(INPUT_POST, 'adresse');
        $mail = filter_input(INPUT_POST, 'mail');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $erreurs = M_Client::creerClient($identifiant, $mdp, $nom, $prenom, $adresse, $cp, $ville, $mail);
        if ($erreurs) {
            afficheErreurs($erreurs);
        } else {
            afficheMessage("Vous êtes bien inscrit, félicitations !");
        }
        break;
}