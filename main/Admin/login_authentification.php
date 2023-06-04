<?php
    require('requete.php');

    $login = $_POST['txt-login'];
    $mdp = $_POST['txt-password'];
    $reponse = $_POST["reponse"];
    $_SESSION["status"] = "";

    if (isset($_POST["btn-crea-user"])) {
        create_user($mdp, $login);
        header("Location: login?conexion=1");
    }

    //recup id user
    $return_id_user = return_id_user($login);
    $return_id = $return_id_user->fetchAll();
    foreach($return_id as $id) {$_SESSION["idUser"] = $id["id"];}

    /*Test si le user exister*/
    if(empty($_SESSION["idUser"])) {
        $_SESSION["status"] = "L'identifiant ou le mot de passe est incorrect.";
        header("Location: login?conexion=1");
    }

    //test identifiant
    $authentification = authentification($login);
    $auth = $authentification->fetch();
    $pass = $auth["mdp"];

    switch($auth["count(login)"]) {
        case 0 :
            $_SESSION["status"] = "L'identifiant ou le mot de passe est incorrect.";
            log_conexion("Tentative de conexion de l'utilisateur", $_SESSION["idUser"], $_SESSION["date"], $_SESSION["heure"]);
            header("Location: login?conexion=1");
            break;
        case 1 :
            if(password_verify($mdp, $pass)) {                
                if((isset($_POST['reponse'])) && !empty($_POST['reponse'])) {
                    if($_SESSION['captcha'] == $reponse) {
                        $_SESSION["status"] = $_SESSION["idUser"];
                        log_conexion("Conexion de l'utilisateur", $_SESSION["idUser"], $_SESSION["date"], $_SESSION["heure"]);
                        $getplayer = get_player($_SESSION["idUser"]);
                        $infos_player = $getplayer->fetchAll();
                        foreach($infos_player as $res) {
                            $_SESSION["jeton"] = $res["jeton"];
                            $_SESSION["niveau"] = $res["niv"];
                            $_SESSION["idP"] = $res["id"];
                            $_SESSION["pseudo"] = $res["login"];
                        }
                        header("Location: ../index");
                        break;
                    } 
                    else {
                        $_SESSION["status"] = "Capchat non conforme";
                        log_conexion("Tentative de conexion de l'utilisateur (Capchat non conforme)", $_SESSION["idUser"], $_SESSION["date"], $_SESSION["heure"]);
                        header("Location: login?conexion=1");
                        break;
                    }
                }
            } else {
                log_conexion("Tentative de conexion de l'utilisateur", $_SESSION["idUser"], $_SESSION["date"], $_SESSION["heure"]);
                $_SESSION["status"] = "L'identifiant ou le mot de passe est incorrect.";
                header("Location: login?conexion=1");
                break;
            }
        default :
            $_SESSION["status"] = "Il existe plusieur compte contacter l'administateur.";
            header("Location: login?conexion=1");
            throw("erreur");
            break;
    }

    /*Crypage de mdp + add un bdd*/
    function create_user($pass, $login) {
        $pass = password_hash($pass, PASSWORD_ARGON2ID);
        create_users($pass, $login);
    }
?>