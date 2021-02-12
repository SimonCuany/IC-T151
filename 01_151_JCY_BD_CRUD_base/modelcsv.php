<?php
/**
 * Projet   : 133
 * Fichier  : model.php (modelcsv.php)
 * Auteur   : Jean-Philippe.CHAVEY
 * Date     : 10.05.2020 14:38
 * Version  : 1.0.0
 * Description: Ce fichier va contenir des fonctions, notamment getSnows(), avec accès à un fichier csv
 */

function getSnows()
{
    //Cette fonction renvoie un tableau avec les snows (pas associatif, entêtes mélangées avec snows)
    $tab = []; //Définition d'un  tableau vide

    //Définition d'un pointeur vers le fichier
    $fsnows = fopen('data/snows.csv', 'r+') or die("Fichier inexistant");
    $entetes=fgetcsv($fsnows, 1024, ';');//première ligne d'entête
    //On pourrait lire les entêtes mais on suppose qu'elle sont connues
    while ($lignedata = fgetcsv($fsnows, 1024, ';')) //$lignedata contient une ligne en tableau de 0 à 4
    {
        $new=[];
        $new['idSnow']=$lignedata[0];
        $new['Marque']=$lignedata[1];
        $new['Boots']=$lignedata[2];
        $new['Type']=$lignedata[3];
        $new['disponibilite']=$lignedata[4];

        $tab[]=$new;
   }
   fclose($fsnows); //fermeture du fichier
   return $tab; //renvoi du tableau

}

function updateSnows($snows){
    //Cette fonction réécrit tout le fichier snows.csv à partir du tableau associatif

    //Ecriture des entêtes
    $contenu = "idSnow;Marque;Boots;Type;disponibilite";

    foreach($snows as $snow){
        $contenu=$contenu."\n".$snow['idSnow'].";".$snow['Marque'].";".$snow['Boots'].";".$snow['Type'].";".$snow['disponibilite'];
    }
    //Réécriture physique
    file_put_contents ('data/snows.csv', $contenu);

}
