<!DOCTYPE HTML>
<head>
    <meta charset="utf-8" ;
</head>
<BODY>
<H1> Nos produits</H1>
<h3><em>Rent a snow</em> est spécialisée dans la location de snows. Voici les snows à disposition.</h3>
<?php
require_once("model.php"); //appel
/*-----------------------------
Tableau complet avec boucle while + foreach
-----------------------------*/

if (!isset($_GET['fchaine'])) {
    $snows = getSnows();
} else {
    $snows = getSnowsFiltre($_GET['fchaine']);
}

//$snows= array(['idSnow'=>'B126','Marque'=>'Burton','Boots'=>'Goofy','Type'=>'Alpin','disponibilite'=>2],
//           ['idSnow'=>'N766','Marque'=>'Niedecker','Boots'=>'Regular','Type'=>'Curved','disponibilite'=>24]);


// ----------------- Lecture du tableau ----------------------------//
$ligne = 1; // compteur de ligne

echo "<table >";
//Affichage des entêtes (on suppose qu'elles sont connues)
echo "<tr bgcolor='#7fffd4'>
    <th >idSnow</th>
    <th>Marque</th>
    <th>Boots</th>
    <th>Type</th>
    <th>disponibilite</th></tr>";

//Affichage des snows
foreach ($snows as $snow) //$tab contient une ligne
{
    echo "<tr >";
    //affichage de chaque champ de la ligne en question
    // Affichage des contenus
    echo "<td>" . $snow['idSnow'] . "</td>";
    echo "<td>" . $snow['Marque'] . "</td>";
    echo "<td>" . $snow['Boots'] . "</td>";
    echo "<td>" . $snow['Type'] . "</td>";
    echo "<td>" . $snow['Disponibilite'] . "</td>";
    echo "<td><a href='snow_delete.php?idSnow=" . $snow['idSnow'] . "'>Détruire</a></td>";
    echo "<td><a href='snow_update.php?idSnow=" . $snow['idSnow'] . "'>Modifier</a></td>";
}
echo "</table>";

?>
<br>
<h3><a href='snow_add.php'>Ajouter un snow</a></h3>

<h1>Filtrer</h1>

<form class="form" method="GET" action="index.php">
    <table>
        <tr>
            <td>
                Chaine à chercher
            </td>
            <td>
                <input type="text" placeholder="Chaine à chercher" name="fchaine" value="">
            </td>
        </tr>
    </table>
    <input type="submit" class="btn" value="Filtrer">


</form>


</BODY>
