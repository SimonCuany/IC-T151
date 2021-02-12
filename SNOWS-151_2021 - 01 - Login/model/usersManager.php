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
        $result=true;
    }

    return $result;
}

function registerNewAccount($userEmailAddress, $userPsw){
    $strSeparator = '\'';
    $registerQuery = 'INSERT INTO users (`userEmailAddress`, `userPsw`) VALUE '. $strSeparator . $userEmailAddress . $strSeparator. ' and userPsw = '. $strSeparator . $userPsw . $strSeparator;

    require_once 'model/dbConnector.php';
    //echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);

}

