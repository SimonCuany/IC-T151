<?php
/**
 * Created by PhpStorm.
 * User: Bastian.CHOLLET
 * Date: 20.12.2019
 * Time: 13:41
 */
// tampon de flux stocké en mémoire
ob_start();
$titre = "RentASnow - Panier";
?>
    <h2>Votre panier</h2>
    <table class="table textcolor">
        <tbody>
        <tr>
            <th>key</th>
            <th>Code</th>
            <th>dateD</th>
            <th>qty</th>
            <th>nbD</th>
            <th>Remove</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $key => $row) { ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $row['code'] ?></td>
                <td><?= $row['dateD'] ?></td>
                <td><?= $row['qty'] ?>
                    <a href="index.php?action=qtyChange&modif=1&key=<?= $key ?>">
                        <button>+</button>
                    </a>
                    <a href="index.php?action=qtyChange&modif=1&key=<?= $key ?>">
                        <button>-</button>
                    </a>
                </td>
                <td><?= $row['nbD'] ?></td>
                <td><a href="index.php?action=delCart&key=<?= $key ?>">
                        <button>Supprimer</button>
                    </a></td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
require "gabarit.php";