<?php
    session_start();
    require('config.php');

    if(isset($_GET['achat'])){
        $requete = achat_jeton($_GET['achat']);
        $res=$requete->fetch();
        $jeton = $res["jeton"];
        $niv = $res["niv"];

        $jeton = $jeton + $_GET['achat'];
        if ($_GET['achat'] == 1000) {
            $niv = $niv - 1;
        }
        elseif ($_GET['achat'] == 5000) {
            $niv = $niv - 2;
        }
        elseif ($_GET['achat'] == 15000) {
            $niv = $niv - 3;
        }
        elseif ($_GET['achat'] == 50000) {
            $niv = $niv - 5;
        }
        elseif ($_GET['achat'] == 150000) {
            $niv = $niv - 10;
        }
        $_SESSION["jeton"] = $jeton;
        $_SESSION["niv"] = $niv;
        uptade_jeton($jeton, $niv);
        header('Location: ../index.php');
    }//fin btn-achat de jeton

    function connexion(){
        $pdo=connexion_bdd();
        $sql="SELECT login, MDP, id FROM player where login='".$_POST['txt-login']."' and MDP='".$_POST['txt-password']."'";
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete

    function get_jeton(){
        $pdo=connexion_bdd();
        $sql="select jeton from player where id=".$_SESSION["id"];
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete
    
    function get_niv(){
        $pdo=connexion_bdd();
        $sql="select niv from player where id=".$_SESSION["id"];
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete

    function verification_exist($login){
        $pdo=connexion_bdd();
        $sql="SELECT count(login) FROM player where login='$login'";
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete

    function verification_connect(){
        $pdo=connexion_bdd();
        $sql="SELECT connect FROM player where id='".$_SESSION["id"];
        $stmt=$pdo->query($sql);
        if ($stmt == "0") {
            $verif = false;
        }
        else {
            $verif = true;
        }
        return $verif;
    }//fin requete

    function achat_jeton($nbJ){
        $pdo=connexion_bdd();
        $sql="SELECT jeton,niv FROM player where id=1";
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete

    function uptade_jeton($jeton, $niv){
        $pdo=connexion_bdd();
        $sql="UPDATE player SET jeton='".$jeton."', niv='".$niv."' WHERE id=1;";
        $stmt=$pdo->query($sql);
        return $stmt;
    }//fin requete
?>