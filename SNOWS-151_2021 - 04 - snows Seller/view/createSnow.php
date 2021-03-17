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
<h1>Ajout d'un Snow</h1>

<article>
    <form action="index.php?action=createSnow" method="post" class="form">
        <div class="container">

            <!--Code-->
            <label for="inputCode">Code</label>
            <input type="text" id="inputCode">

            <!--Marque-->
            <label for="inputMarque">Marque</label>
            <input type="text" id="inputMarque">

            <!--Model-->
            <label for="inputModel">Model</label>
            <input type="text" id="inputModel">

            <!--Longueur-->
            <label for="inputLongueur">Longueur</label>
            <input type="text" id="inputLongueur">

            <!--Prix-->
            <label for="inputPrix">Prix</label>
            <input type="text" id="inputPrix">

            <!--Disponibilité-->
            <label for="inputDispo">Disponibilité</label>
            <input type="text" id="inputDispo">
            <br>
        </div>
        <a href="index.php?action=snows">
            <button class="btn btn-primary">Retour</button>
        </a>
    </form>
</article>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>

