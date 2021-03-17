<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

function home(){
    $_GET['action'] = "home";
    require "view/home.php";
}

function login($loginRequest){
    //if a login request was submitted
    if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])) {
        //extract login parameters
        $userEmailAddress = $loginRequest['inputUserEmailAddress'];
        $userPsw = $loginRequest['inputUserPsw'];

        //try to check if user/psw are matching with the database
        require_once "model/usersManager.php";
        if (isLoginCorrect($userEmailAddress, $userPsw)) {
            $userType=getUserType($userEmailAddress);
            createSession($userEmailAddress,$userType);
            $_GET['loginError'] = false;
            $_GET['action'] = "home";
            require "view/home.php";
        } else { //if the user/psw does not match, login form appears again
            $_GET['loginError'] = true;
            $_GET['action'] = "login";
            require "view/login.php";
        }
    }else{ //the user does not yet fill the form
        $_GET['action'] = "login";
        require "view/login.php";
    }
}
/**
 * This function is designed to create a new user session
 * @param $userEmailAddress : user unique id
 */
function createSession($userEmailAddress,$userType){
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['userType']=$userType;
}

function register($registerRequest){
    //variable set
    if (isset($registerRequest['inputUserEmailAddress']) && isset($registerRequest['inputUserPsw']) && isset($registerRequest['inputUserPswRepeat'])) {

        //extract register parameters
        $userEmailAddress = $registerRequest['inputUserEmailAddress'];
        $userPsw = $registerRequest['inputUserPsw'];
        $userPswRepeat = $registerRequest['inputUserPswRepeat'];

        if ($userPsw == $userPswRepeat){
            require_once "model/usersManager.php";
            if (registerNewAccount($userEmailAddress, $userPsw)){ //Cas inscription tout OK, on crée direct la session
                createSession($userEmailAddress,1);
                $_GET['registerError'] = false;
                $_GET['action'] = "home";
                require "view/home.php";
            } else{ //Cas requête refusée (email existant)
                $_GET['registerError'] = true;
                $_GET['action'] = "register";
                require "view/register.php";
            }
        }else{ //Cas inscription pas possible, il faut recommencer
            $_GET['registerError'] = true;
            $_GET['action'] = "register";
            require "view/register.php";
        }
    }else{ //Cas où on arrive sans données
        $_GET['action'] = "register";
        require "view/register.php";
    }
}

/**
 * This function is designed to manage logout request
 */
function logout(){
    $_SESSION = array();
    session_destroy();
    $_GET['action'] = "home";
    require "view/home.php";
}

function displaySnows(){
    require_once("model/snowsManager.php");

    //solution sans isset (si non loggé, @$_SESSION['userType'] renvoie false)
    if (@$_SESSION['userType']==2){
        $snows=getSnows();
        require "view/snowsSeller.php";
    } else{ // cas client
        if (isset($_POST['fSearch'])){ //avec recherche
            $snows=getSnowsSearch($_POST['fSearch']);
        } else { //sans recherche
            $snows=getSnows();
        }
        require "view/snows.php";
    }
}

function addSnow(){
    //Cette fonction est pour ajouter un snow

    if (isset($_POST['fcode'])) {
        //cas où on ajoute vraiment un snow en BD
        require_once("model/snowsManager.php");
        $result=addSnowBD($_POST['fcode'],$_POST['fbrand'],$_POST['fmodel'],$_POST['fSnowLength'],
            $_POST['fQtyAvailable'], $_POST['fDescription'],$_POST['fDailyPrice'],
            $_POST['fPhoto'],$_POST['factive']);

        if ($result){ //cas OK si result=1
            displaySnows(); //rappel de l'affichage des snows.
        } else { //cas d'erreur, ajout impossible
            $adderror="Erreur d'ajout de snow (attention doublon ou type de données)";
            require "view/addSnow.php";
        }

    } else {
        //appel du formulaire d'ajout de snow
        require "view/addSnow.php";
    }



}

function delSnow($code){
    //Cette fonction détruit le snow correspondant au code et rappelle la liste
    require_once("model/snowsManager.php");
    delSnowBD($code); //appel de la fonction en BD
    displaySnows(); //rappel de l'affichage des snows
}

function displayCart(){
    //Cette fonction affiche le panier
    require "view/cart.php";
}

function delCart($index){
    //Supprime la ligne $index du panier et réaffiche le panier
    // deux syntaxes pour supprimer la ligne $index
    //unset($_SESSION['cart'][$index]); //laisse le trou (ne renumérote pas)
    array_splice($_SESSION['cart'], $index, 1); //renumérote depuis 0

    require "view/cart.php";
}

function addSnowCart($code){
    //ajoute au panier le snow demandé (avec durée de 1 jour, quantité 1)
    //pour l'instant en date fixe
   $newSnowLeasing = array('code' => $code, 'dateD' => date("Y-m-d"), 'nbD' => 1, 'qty' => 1);
    if (!isset($_SESSION['cart'])){ //cas où le panier n'existait pas
        $_SESSION['cart']=[];
        echo "nouveau";
    }
    //array_push($_SESSION['cart'], $newSnowLeasing); //ajouter une ligne (syntaxe 1)
    $_SESSION['cart'][]=$newSnowLeasing; //ajouter une ligne au panier (syntaxe 2)
    require "view/cart.php";

}

function qtyChange($key, $modif){

    if ($modif += $_SESSION['cart'][$key]['qty']>0){
        $_SESSION['cart'][$key]['qty']+=$modif;
        require "view/cart.php";
    }else{
        delCart($key);
    }

}