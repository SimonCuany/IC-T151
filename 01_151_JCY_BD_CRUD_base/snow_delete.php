<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
 </head>
 <body>
    <h1>Suppression de snow</h1>
  <?php
  require_once("model.php");
  // ------------ Suppression de snow ------------------------
  delSnow(@$_GET['idSnow'])

  ?>

    Le snow supprimé est le <strong><?= @$_GET['idSnow'];?></strong> <br>
    <br><h3><a href='index.php'>Retour à la liste</a></h3>

</body>
</html>