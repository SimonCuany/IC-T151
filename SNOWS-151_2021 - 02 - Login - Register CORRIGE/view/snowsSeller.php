<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:16
 */

// tampon de flux stocké en mémoire
ob_start();
$titre = "RentASnow - Accueil";
?>
    <!--__________CONTENU__________-->

    <!--  <div class="span12" id="divMain">-->

    <!--<article>
        <header>-->
    <h2> Nos snows</h2>
    <table class="table textcolor">
    <tr>
        <th>Code</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Longueur</th>
        <th>Quantité</th>
        <th>Description</th>
        <th>Prix du jour</th>
        <th>photo</th>
        <th>Disponibilité</th>
    </tr>

<?php

foreach ($snows as $snow) :?>

    <tr>
     <td><a href="index.php?action=displayASnow&code=<?=$snow['code']?>"><?=$snow['code']?></a> </td>
     <td><?= $snow['brand'] ?></td>
     <td><?= $snow['model'] ?></td>
     <td><?= $snow['snowLength'] . " cm" ?></td>
     <td><?= $snow['qtyAvailable'] ?></td>
     <td><?= $snow['description'] ?></td>
     <td><?= $snow['dailyPrice'] . " CHF"?></td>
     <td><a href="<?= $snow['photo']?>" target="_blank"><img src="<?= $snow['photo']?>" alt="imgsnows"></a></td>
     <td><?php if ($snow['active'] === "1"){echo "actif";} else{echo "pas dispo";}?></td>

    </tr>

<?php endforeach;?>
    </table>

    <!-- Contenu statique  -->
    <!-- <div class="yox-view">

        <div class="row-fluid">
            <ul class="thumbnails">

                <li class="span3">
                    <div class="thumbnail">
                        <a href="view/content/images/B101.jpg" target="blank"><img
                                    src="view/content/images/B101_small.jpg" alt="B101"></a>
                        <div class="caption">
                            <h3><a href="index.php?action=displayASnow&code=B101">B101</a></h3>
                            <p><strong>Marque : </strong>Burton</p>
                            <p><strong>Modèle : </strong>Custom</p>
                            <p><strong>Longueur : </strong>160 cm</p>
                            <p><strong>Prix :</strong> CHF 29.- / jour</p>
                            <p><strong>Disponibilité : </strong>0</p>
                            <p><a href="index.php?action=snowLeasingRequest&code=B101" class="btn btn-primary">Louer
                                    ce snow</a></p>
                        </div>
                    </div>
                </li>

                <div class="row-fluid">
                    <ul class="thumbnails">

                        <li class="span3">
                            <div class="thumbnail">
                                <a href="view/content/images/B126.jpg" target="blank"><img
                                            src="view/content/images/B126_small.jpg" alt="B126"></a>
                                <div class="caption">
                                    <h3><a href="index.php?action=displayASnow&code=B126">B126</a></h3>
                                    <p><strong>Marque : </strong>Burton</p>
                                    <p><strong>Modèle : </strong>Free Thinker</p>
                                    <p><strong>Longueur : </strong>165 cm</p>
                                    <p><strong>Prix :</strong> CHF 45.- / jour</p>
                                    <p><strong>Disponibilité : </strong>0</p>
                                    <p><a href="index.php?action=snowLeasingRequest&code=B126"
                                          class="btn btn-primary">Louer ce snow</a></p>
                                </div>
                            </div>
                        </li>

                        <div class="row-fluid">
                            <ul class="thumbnails">

                                <li class="span3">
                                    <div class="thumbnail">
                                        <a href="view/content/images/B327.jpg" target="blank"><img
                                                    src="view/content/images/B327_small.jpg" alt="B327"></a>
                                        <div class="caption">
                                            <h3><a href="index.php?action=displayASnow&code=B327">B327</a></h3>
                                            <p><strong>Marque : </strong>Burton</p>
                                            <p><strong>Modèle : </strong>Day Trader</p>
                                            <p><strong>Longueur : </strong>155 cm</p>
                                            <p><strong>Prix :</strong> CHF 25.- / jour</p>
                                            <p><strong>Disponibilité : </strong>6</p>
                                            <p><a class="btn btn-danger" disabled="disabled">Plus en
                                                    location</a></p>
                                        </div>
                                    </div>
                                </li>

                                <div class="row-fluid">
                                    <ul class="thumbnails">

                                        <li class="span3">
                                            <div class="thumbnail">
                                                <a href="view/content/images/K266.jpg" target="blank"><img
                                                            src="view/content/images/K266_small.jpg" alt="K266"></a>
                                                <div class="caption">
                                                    <h3>
                                                        <a href="index.php?action=displayASnow&code=K266">K266</a>
                                                    </h3>
                                                    <p><strong>Marque : </strong>K2</p>
                                                    <p><strong>Modèle : </strong>Wildheart</p>
                                                    <p><strong>Longueur : </strong>152 cm</p>
                                                    <p><strong>Prix :</strong> CHF 29.- / jour</p>
                                                    <p><strong>Disponibilité : </strong>0</p>
                                                    <p><a href="index.php?action=snowLeasingRequest&code=K266"
                                                          class="btn btn-primary">Louer ce snow</a></p>
                                                </div>
                                            </div>
                                        </li>

                                        <div class="row-fluid">
                                            <ul class="thumbnails">

                                                <li class="span3">
                                                    <div class="thumbnail">
                                                        <a href="view/content/images/N100.jpg"
                                                           target="blank"><img
                                                                    src="view/content/images/N100_small.jpg"
                                                                    alt="N100"></a>
                                                        <div class="caption">
                                                            <h3>
                                                                <a href="index.php?action=displayASnow&code=N100">N100</a>
                                                            </h3>
                                                            <p><strong>Marque : </strong>Nidecker</p>
                                                            <p><strong>Modèle : </strong>Tracer</p>
                                                            <p><strong>Longueur : </strong>164 cm</p>
                                                            <p><strong>Prix :</strong> CHF 39.- / jour</p>
                                                            <p><strong>Disponibilité : </strong>0</p>
                                                            <p>
                                                                <a href="index.php?action=snowLeasingRequest&code=N100"
                                                                   class="btn btn-primary">Louer ce snow</a></p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <div class="row-fluid">
                                                    <ul class="thumbnails">

                                                        <li class="span3">
                                                            <div class="thumbnail">
                                                                <a href="view/content/images/N754.jpg"
                                                                   target="blank"><img
                                                                            src="view/content/images/N754_small.jpg"
                                                                            alt="N754"></a>
                                                                <div class="caption">
                                                                    <h3>
                                                                        <a href="index.php?action=displayASnow&code=N754">N754</a>
                                                                    </h3>
                                                                    <p><strong>Marque : </strong>Nidecker</p>
                                                                    <p><strong>Modèle : </strong>Ultralight</p>
                                                                    <p><strong>Longueur : </strong>166 cm</p>
                                                                    <p><strong>Prix :</strong> CHF 59.- / jour
                                                                    </p>
                                                                    <p><strong>Disponibilité : </strong>0</p>
                                                                    <p>
                                                                        <a href="index.php?action=snowLeasingRequest&code=N754"
                                                                           class="btn btn-primary">Louer ce
                                                                            snow</a></p>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <div class="row-fluid">
                                                            <ul class="thumbnails">

                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="view/content/images/P067.jpg"
                                                                           target="blank"><img
                                                                                    src="view/content/images/P067_small.jpg"
                                                                                    alt="P067"></a>
                                                                        <div class="caption">
                                                                            <h3>
                                                                                <a href="index.php?action=displayASnow&code=P067">P067</a>
                                                                            </h3>
                                                                            <p><strong>Marque : </strong>Prior
                                                                            </p>
                                                                            <p><strong>Modèle : </strong>Brandwine
                                                                                153</p>
                                                                            <p><strong>Longueur : </strong>154
                                                                                cm</p>
                                                                            <p><strong>Prix :</strong> CHF 49.-
                                                                                / jour</p>
                                                                            <p><strong>Disponibilité : </strong>0
                                                                            </p>
                                                                            <p>
                                                                                <a href="index.php?action=snowLeasingRequest&code=P067"
                                                                                   class="btn btn-primary">Louer
                                                                                    ce snow</a></p>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <div class="row-fluid">
                                                                    <ul class="thumbnails">

                                                                        <li class="span3">
                                                                            <div class="thumbnail">
                                                                                <a href="view/content/images/P165.jpg"
                                                                                   target="blank"><img
                                                                                            src="view/content/images/P165_small.jpg"
                                                                                            alt="P165"></a>
                                                                                <div class="caption">
                                                                                    <h3>
                                                                                        <a href="index.php?action=displayASnow&code=P165">P165</a>
                                                                                    </h3>
                                                                                    <p><strong>Marque
                                                                                            : </strong>Prior</p>
                                                                                    <p><strong>Modèle
                                                                                            : </strong>BC Split
                                                                                        161</p>
                                                                                    <p><strong>Longueur
                                                                                            : </strong>169 cm
                                                                                    </p>
                                                                                    <p><strong>Prix :</strong>
                                                                                        CHF 35.- / jour</p>
                                                                                    <p><strong>Disponibilité
                                                                                            : </strong>0</p>
                                                                                    <p>
                                                                                        <a href="index.php?action=snowLeasingRequest&code=P165"
                                                                                           class="btn btn-primary">Louer
                                                                                            ce snow</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <div class="row-fluid">
                                                                            <ul class="thumbnails">

                                                                                <li class="span3">
                                                                                    <div class="thumbnail">
                                                                                        <a href="view/content/images/K409.jpg"
                                                                                           target="blank"><img
                                                                                                    src="view/content/images/K409_small.jpg"
                                                                                                    alt="K409"></a>
                                                                                        <div class="caption">
                                                                                            <h3>
                                                                                                <a href="index.php?action=displayASnow&code=K409">K409</a>
                                                                                            </h3>
                                                                                            <p><strong>Marque
                                                                                                    : </strong>K2
                                                                                            </p>
                                                                                            <p><strong>Modèle
                                                                                                    : </strong>Lime
                                                                                                Lite</p>
                                                                                            <p><strong>Longueur
                                                                                                    : </strong>149
                                                                                                cm</p>
                                                                                            <p><strong>Prix
                                                                                                    :</strong>
                                                                                                CHF 55.- / jour
                                                                                            </p>
                                                                                            <p><strong>Disponibilité
                                                                                                    : </strong>0
                                                                                            </p>
                                                                                            <p>
                                                                                                <a href="index.php?action=snowLeasingRequest&code=K409"
                                                                                                   class="btn btn-primary">Louer
                                                                                                    ce snow</a>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>


                                                                        </div>

</header>
</article>
<hr/>

</div>-->

    <?php
    $content = ob_get_clean();
    require "gabarit.php"?>

