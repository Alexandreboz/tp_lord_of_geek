<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'loginClient':
        $identifiant = filter_input(INPUT_POST, 'identifiant');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $client = M_Client::trouverClientParIdentifiantEtMDP($identifiant, $mdp);
        if (!$client) {
            afficheErreur("Entrez votre identifiant et votre mot de passe ou enregistrez-vous sur la page Inscription");
        } else {
            $_SESSION['client'] = $client;
            header('Location: index.php');
        }
        break;
    case 'logoutClient':
        supprimerPanier();
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}