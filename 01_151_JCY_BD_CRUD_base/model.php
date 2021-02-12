<?php

function openDBConnexion()
{
    $tempDbConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'snows';
    $userName = 'root';
    $userPwd = 'root';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try {
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);
    } catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage();
    }
    return $tempDbConnexion;
}


function executeQuerySelect($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();//open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll();//prepare result for client
    }
    $dbConnexion = null;//close database connexion
    return $queryResult;
}

/**
 * This function is designed to insert, delete or update value in database
 * @param $query
 * @return bool|null : $statement->execute() returne true is the insert was successful
 */
function executeQueryIUD($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();//open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);//prepare query
        $queryResult = $statement->execute();//execute query
    }
    $dbConnexion = null;//close database connexion
    return $queryResult;
}


function getSnows()
{
    $sql = "SELECT * FROM snows order by Disponibilite";
    $result = executeQuerySelect($sql);
    return $result;
}


//Cette fonction ajoute un snow
function addSnow($id, $marque, $boots, $type, $dispo)
{
    $sql = "INSERT INTO snows(idSnow, Marque, Boots, Type, Disponibilite) VALUES ('$id','$marque','$boots','$type', $dispo)";
    //echo $sql;
    $result = executeQueryIUD($sql);
    return $result;
}

//Cette fonction supprime un snow
function delSnow($id)
{
    $sql = "DELETE FROM snows where idSnow = '$id'";
    //echo $sql;
    $result = executeQueryIUD($sql);
    return $result;
}

function getASnow($id)
{
    $sql = "SELECT * FROM snows WHERE idsnow='$id'";
    $result = executeQuerySelect($sql);
    return $result;

}

//Cette fonction modifie un snow
function updateSnow($id, $marque, $boots, $type, $dispo)
{
    $sql = "UPDATE snows SET Marque = '$marque',
                             Boots = '$boots', 
                             Type = '$type', 
                             Disponibilite = '$dispo'
                             where idsnow = '$id'";
echo $sql;
    $result = executeQueryIUD($sql);
    return $result;
}


function getSnowsFiltre($id,$chaine,$dispo){

    $sql = "SELECT * FROM snows WHERE (Marque LIKE '%$chaine%' OR Boots LIKE '%$chaine%' OR Type LIKE '%$chaine%')";
    if ($id<>""){$sql.="AND idSnow ='$id";}
    if ($dispo>0){$sql.="AND Disponibilite> $dispo";}
    echo $sql;
    $result = executeQuerySelect($sql);
    return $result;
}
