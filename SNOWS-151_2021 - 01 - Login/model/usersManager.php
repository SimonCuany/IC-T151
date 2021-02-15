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
    //echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);

    if (count($queryResult) == 1)
    {
        $userHashPsw = $queryResult[0]['userHashPsw'];
        $result = password_verify($userPsw,$userHashPsw);
    }

    var_dump($result );
    return $result;
}

function registerNewAccount($userEmailAddress, $userPsw){
    $strSeparator = '\'';

    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $registerQuery = 'INSERT INTO users (userEmailAddress, userHashPsw) VALUES ('.$userEmailAddress.','. $userHashPsw.')';
    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($registerQuery);
return $queryResult;
}

