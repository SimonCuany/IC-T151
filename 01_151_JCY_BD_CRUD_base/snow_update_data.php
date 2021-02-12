
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Rent A Snow - Accueil</title>

</head>
<body>


    <h1>Modification de snow</h1>
  <?php
    require('model.php');
    updateSnow($_POST ['fID'],$_POST['fMarque'],$_POST['fBoots'],$_POST['fType'],$_POST['fDispo']);


  ?>
    Le snow modifié est le <strong><?= @$_POST['fID'];?></strong> <br>
    <br><h3><a href='index.php'>Retour à la liste</a></h3>
</body>
</html>