<?php
/**
 * Projet   : 133
 * Fichier  : model.php (modeljson.php)
 * Auteur   : Jean-Philippe.CHAVEY
 * Date     : 10.05.2020 14:38
 * Version  : 1.0.0
 * Description: Ce fichier va contenir des fonctions, notamment getSnows() avec accès à un fichier json
 */

function getSnows()
{
    //Cette fonction renvoie un tableau avec les snows (pas associatif, entêtes mélangées avec snows)
    $tab =  json_decode(file_get_contents('data/snows.json'),true); // by default, return everything as an associative array
    return $tab; //renvoi du tableau

}

function updateSnows($snows){

    //Cette fonction réécrit tout le fichier snows.json à partir du tableau associatif
    file_put_contents("data/snows.json",json_encode($snows));

}
