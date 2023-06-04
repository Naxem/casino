<?php
    session_start();
    require('config.php');
    $_SESSION["date"] = date("Y-m-d");
    // Définit le fuseau horaire à Paris
    date_default_timezone_set('Europe/Paris');
    $_SESSION["heure"] = date('H:i:s');

    /*Supp User*/
    /*if (isset($_POST["btn-supp"])) {
        $numSecu = $_POST["numSecuPatient"];
        $return_numSecu = return_numSecu($numSecu);
        $return_Num_Secu = $return_numSecu->fetchAll();
        foreach($return_Num_Secu as $res) {$is_existe = $res;}
        if ($is_existe == 1) {
            supp($numSecu);
        }
    }*/

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

    function get_player($id) {
        $pdo=connexion_bdd();
        $sql="select id, mdp, login, date_creation, jeton, niv from player where id=".$id;
        $stmt=$pdo->query($sql);
        return $stmt;
    }

    function verification_exist($login){
        $pdo=connexion_bdd();
        $sql="SELECT count(login) FROM player where login='$login'";
        $stmt=$pdo->query($sql);
        return $stmt;
    }

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
    }

    function achat_jeton($nbJ){
        $pdo=connexion_bdd();
        $sql="SELECT jeton,niv FROM player where id=1";
        $stmt=$pdo->query($sql);
        return $stmt;
    }

    function uptade_jeton($jeton, $niv){
        $pdo=connexion_bdd();
        $sql="UPDATE player SET jeton='".$jeton."', niv='".$niv."' WHERE id=1;";
        $stmt=$pdo->query($sql);
        return $stmt;
    }

    /*Connexion*/
    function return_id_user($login) {
        $pdo = connexion_bdd();
        $stmt = $pdo ->prepare("SELECT id FROM player
        where login = ?;");
        $stmt->execute(array($login));
        return $stmt;
    }

    function authentification($login) {
        $pdo = connexion_bdd();
        $stmt=$pdo->prepare("SELECT count(login), mdp FROM player
        where login = ?;");
        $stmt->execute(array($login));
        return $stmt;
    }

     //logs
     function log_conexion($label, $user, $heure) {
        $pdo = connexion_bdd();
        $stmt = $pdo ->prepare("INSERT INTO logs
        (label, `idUser`, `date`, heure)
        VALUES(?, ?, ?, ?);");
        $stmt->execute(array($label, $user, $_SESSION["date"], $heure));
        return $stmt;
    }

    //créa comptes
    function create_users($pass, $login) {
        $pdo = connexion_bdd();
        $stmt=$pdo->prepare("INSERT INTO player 
        (login, mdp, date_creation, jeton, niv) VALUES(?, ?, ?, ?, ?);");
        $stmt->execute(array($login, $pass, $_SESSION["date"], 500, 0));
    }

    //del
    /*function supp($numSecu) {
        $pdo = connexion_bdd();
        $sql="DELETE FROM hospi
        WHERE NumSecu = ?";     
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array($numSecu));  

        $sql="DELETE FROM couverturesociale
        WHERE NumSecu = ?";     
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array($numSecu));  

        $sql="DELETE FROM patients
        WHERE NumSecu = ?";     
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array($numSecu));

        $sql="DELETE FROM piecesjointes
        WHERE NumSecu = ?";     
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array($numSecu));
        header("location: admin");
    }*/
?>