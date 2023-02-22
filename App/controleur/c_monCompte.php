<?php

include "App/modele/M_Commande.php";
include "App/modele/M_Client.php";

$commandesClient = [];

if (!empty($clientSession)) {
    $commandesClient = M_Commande::afficherCommandes($clientSession['id']);
}
?>






