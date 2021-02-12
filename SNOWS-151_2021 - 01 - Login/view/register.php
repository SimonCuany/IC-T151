<?php
$title ='Rent A Snow - Register';

/* This file manages the form used to enable user being authenticated on the platform
 * Title            : login.php
 * Creation         : 28/11/16
 * Author           : pascal.benzonana@cpnv.ch
 * Update           : 31/01/19 - nicolas.glassey@cpnv.ch
 *                              -html5 integration (div vs table, specific users's inputs)
 *                              -login process simplification(type of user is not more asked)
 *                  : 11/03/19 - docs rewrote in english
 */

ob_start();
?>
<head>
    <title>
        <?= $title ?>
    </title>
</head>
<h2>Register</h2>
<?php if (@$_GET['registerError'] == true) :?>
    <h5><span style="color:red">Register refusé</span></h5>
<?php endif ?>
<article>
    <article>
        <form class='form' method='POST' action="index.php?action=register">

            <p>Pour vous inscrire chez Snows, nous vous prions de renseigner les champs suivants:</p>
            <div class="container">
                <label for="userEmail"><b>Username</b></label>
                <input type="email" placeholder="Enter email address" name="inputUserEmailAddress" required>

                <label for="userPsw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="inputUserPsw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="inputUserPswRepeat" required>

                <p>En soumettant votre demande de compte, vous validez les conditions générales d'utilisation.<a href="https://termsfeed.com/blog/privacy-policies-vs-terms-conditions/">CGU et vie privée</a>.</p>
                <button type="submit" class="registerbtn">Register</button>
            </div>
        </form>
        <div class="container signin">
            <p>Déjà membre ? <a href="index.php?action=login">Login</a>.</p>
        </div>
    </div>
</article>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
