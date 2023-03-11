<?php
    /*header( 'content-type: text/html; charset=utf-8' );*/
    require('requete.php');

    $test_login = connexion();
    $res=$test_login->fetch();

    if ($res['login'] == $_POST['txt-login'] && $res['MDP'] == $_POST['txt-password'])
    {
        /*echo "<br>";
        echo "Vous êtes connecté";*/
        $_SESSION["status"] = $_POST['txt-login'];
        $_SESSION["login"] = $_POST['txt-login'];
        $_SESSION["id"] = $res['id'];
        info();

        header('Location: ../index.php');
    }
    else
    {
        /*echo "Vous n'êtes pas connecté";
        echo "<br>";*/
        $_SESSION["status"] = "le mot de passe ou le login est incorrect";
        $_SESSION["error"] = "1";
        header('Location: ../login.php');
    }

    function info() {
        $jeton = get_jeton();
        $res2=$jeton->fetch();

        $niveau = get_niv();
        $res3=$niveau->fetch();

        $_SESSION["jeton"] = $res2["jeton"];
        $_SESSION["niv"] = $res3["niv"];
    }
?>