
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rent A Snow - Accueil</title>

</head>
<body>


    <h1>Ajout de snow</h1>

    <?php
    require('model.php');

    if (!empty($_POST['fID'])) {
        $res=addSnow($_POST['fID'],$_POST['fMarque'],$_POST['fBoots'],$_POST['fType'],$_POST['fDispo']);
        //echo $res;
        if ($res)
        {echo "Le snow ajouté est le <strong>".@$_POST['fID']. "</strong> <br>";}
        else
        {echo "l'insertion a échoué. Doublon ? type de champ ?";}
    } else
    {
        echo "moi j'accepte pas d'id vide pour un snow <br>";
    }
    ?>

    <br><h3><a href='index.php'>Retour à la liste</a></h3>
</body>
</html>