<?php

function getSnows  (){

    $loginQuery = 'SELECT * FROM snows ORDER BY code;';

    require_once 'model/dbConnector.php';
    //echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);

    return $queryResult;

}
