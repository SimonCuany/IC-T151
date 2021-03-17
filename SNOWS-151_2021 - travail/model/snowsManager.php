<?php
/**
 * Projet   : www
 * Fichier  : snowsManager.php
 * Auteur   : Jean-Philippe.CHAVEY
 * Date     : 19.02.2021 08:17
 * Version  : 1.0.0
 * Description: Ce programme contient les fonctions d'accès à la BD pour les snows
 */

function getSnows(){
    //Cette fonction renvoie la liste des snows triés par ID
    $loginQuery = "SELECT * FROM snows ORDER BY code";
    require_once 'model/dbConnector.php';
    //echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);
    return $queryResult;
}

function getSnowsSearch($chaine){
    //Cette fonction renvoie la liste des snows filtrés
    $loginQuery = "SELECT * FROM snows";
    $loginQuery .=" WHERE CONCAT(code, brand, model) LIKE '%$chaine%'";
    $loginQuery .= " ORDER BY code";
    echo $loginQuery;
    require_once 'model/dbConnector.php';

    $queryResult = executeQuerySelect($loginQuery);
    return $queryResult;
}

function addSnowBD($code,$brand,$model,$SnowLength,$qtyAvailable,
            $Description,$DailyPrice,$Photo,$factive){
    //Cette fonction ajoute en BD
    //INSERT INTO `snows` (`id`, `code`, `brand`, `model`, `snowLength`, `qtyAvailable`, `description`, `dailyPrice`, `photo`, `active`) VALUES (NULL, 'code', 'brand', 'model', '1', '1', 'description', '3', 'chemin photo', '1');
    $Query="INSERT INTO snows (id,code,brand,model,snowLength,qtyAvailable,description,dailyPrice,photo,active)
            VALUES (NULL,";
    $Query.="'$code', '$brand', '$model', $SnowLength, $qtyAvailable, '$Description', $DailyPrice, '$Photo', $factive)";
    echo $Query;
    require_once 'model/dbConnector.php';
    $result=executeQueryIUD($Query);

    return $result ;
}

function delSnowBD($code){
    //Cette fonction détruit en BD le snow $code
    $Query="DELETE FROM snows WHERE code='$code'";
    echo $Query;
    require_once 'model/dbConnector.php';
    $result=executeQueryIUD($Query);
    return $result ;
}