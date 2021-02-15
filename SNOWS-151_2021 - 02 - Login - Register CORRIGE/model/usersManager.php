<?php
/**
 * This function is designed to verify user's login
 * @param $userEmailAddress
 * @param $userPsw
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 */
function isLoginCorrect($userEmailAddress, $userPsw){
    $result = false;

    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM users WHERE userEmailAddress = '. $strSeparator . $userEmailAddress . $strSeparator. ' and userPsw = '. $strSeparator . $userPsw . $strSeparator;

    require_once 'model/dbConnector.php';
    echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);

    if (count($queryResult) == 1)
    {
        $result=true;
    }

    return $result;
}

function registerNewAccount($userEmailAddress, $userPsw){

    $strSeparator = '\'';

    //$userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);

    //$registerQuery = 'INSERT INTO users (`userEmailAddress`, `userHashPsw`) VALUES (' .$strSeparator . $userEmailAddress .$strSeparator . ','.$strSeparator . $userHashPsw .$strSeparator. ')';
    $registerQuery = 'INSERT INTO users (`userEmailAddress`, `userPsw`) 
        VALUES (' .$strSeparator . $userEmailAddress .$strSeparator . ',
        '.$strSeparator . $userPsw .$strSeparator. ')';
    echo $registerQuery;
    require_once 'model/dbConnector.php';
    $queryResult = executeQueryIUD($registerQuery);

    return $queryResult;//renvoie true (si l'insert a été exécuté) ou false (si l'insert a été refusé)
}