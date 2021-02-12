<?php
require_once("model.php");
$snows=getASnow($_GET['idSnow']);

$idsnow=$snows[0]['idSnow'];
$marque=$snows[0]['Marque'];
$boots=$snows[0]['Boots'];
$type=$snows[0]['Type'];
$disponibilite=$snows[0]['Disponibilite'];
?>

<!DOCTYPE HTML>
<head>
    <meta charset="utf-8">
</head>
    <BODY>
        <h1>Modification de snow</h1>

        <form class="form" method="POST" action="snow_update_data.php">
          <table >
            <tr>
              <td>IDSnow : </td>
              <td><input type="text" placeholder="Code du snow" name="fID" value="<?=$idsnow ?>" readonly ></td>
            </tr>
            <tr>
              <td>Marque : </td>
              <td><input type="text" placeholder="Entrez la marque" name="fMarque" value="<?=$marque ?>">
              </td>
            </tr>
            <tr>
              <td>Boots : </td>
              <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots" value="<?=$boots ?>"></td>
            </tr>
            <tr>
              <td>Type : </td><td><input type="text" placeholder="Entrez le type de snow" name="fType" value="<?=$type ?>"></td>
            </tr>
            <tr>
              <td>Disponibilité : </td>
              <td><input type="integer" placeholder="Entrez la disponibilité en magasin" name="fDispo" value="<?=$disponibilite ?>"></td>
            </tr>

            <tr>
              <td><input class="btn" type="submit" value="Modifier" /></td>
              <td><input type="reset" class="btn"value="Effacer"/></td>
            </tr>
          </table>
        </form>
</body>
</html>