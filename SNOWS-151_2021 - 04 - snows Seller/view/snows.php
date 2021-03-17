<?php
/**
 * Created by PhpStorm.
 * User: Simon.Cuany
 * Date: 01.03.2021
 * Time: 12.15
 */

// tampon de flux stocké en mémoire
ob_start();
$titre = "RentASnow - Accueil";
?>
    <form action="index.php?action=snows" method="post">
        <label for="fshearch">Entrez une chaine de commentaire pour filtrer</label>
        <input type="text" id="fshearch" name="fsearch"/>
        <input type="submit" value="Filtrer" class="btn btn-primary"/>
    </form>

<?php
foreach ($snows as $snow):
    ?>

    <div style="border: solid black 1px ; border-radius: 5px; display: inline-block; margin: 10px;">
        <a href="<?= $snow['photo']; ?>"><img src="<?= $snow['photo']; ?>"></a><br>
        <h2><a href="index.php?action=displayASnow&code=<?= $snow['code']; ?><?= $snow['code']; ?>"></a></h2><br>
        <h1 class="codeh1">Code : <?= $snow['code']; ?><br></h1>
        Marque : <?= $snow['brand']; ?><br>
        Model : <?= $snow['model'] ?><br>
        Longueur : <?= $snow['snowLength'] ?>cm<br>
        Prix : <?= $snow['dailyPrice'] ?>.- par jour<br>
        Disponibilité : <?= $snow['qtyAvailable'] ?><br>
    </div>
<?php
endforeach;

$content = ob_get_clean();
require "gabarit.php";


