<!DOCTYPE HTML>
<head>
    <meta charset="utf-8";
</head>
<BODY>
<H1>Nos produits</H1>
<h3><em>Rent a snow</em> est spécialisée dans la location de snows. Voici les snows à disposition.</h3>
<?php

/*-----------------------------
Tableau complet avec boucle while + foreach
-----------------------------*/
$fsnows=fopen('data/snows.csv','r+') or die("Fichier inexistant");
  
// ----------------- Lecture du tableau ----------------------------//
$ligne = 1; // compteur de ligne
echo "<table >";

while($tab=fgetcsv($fsnows,1024,';')) //$tab contient une ligne
{
  echo "<tr>";
  //affichage de chaque champ de la ligne en question
  foreach ($tab as $champ)
  {
    if ($ligne ==1)
    {
      // Pour les entêtes de colonnes
      echo "<th bgcolor='#cd5c5c'>".$champ."</th>";
    }
    else
    {  
      // Affichage des contenus
      echo "<td>".$champ."</td>";
    }
  }
  $ligne++;
  echo "<td><a href='snow_delete.php'>Détruire</a></td>";
}
echo "</table>";


?>
<br><h3><a href='snow_add.php'>Ajouter un snow</a></h3>
</BODY>
