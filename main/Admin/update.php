<?php
    require('requete.php');
    $date = gmdate("d-m-y H:i:s");

    if ($_POST['txt-login-creer'] == '' or $_POST['txt-password-creer'] == '') {
        echo "Veuillez entrer un login ou un mot de passe.";
    }

    $verif = verification_exist($_POST['txt-login-creer']);
    $res=$verif->fetch();
    if ($res['count(login)'] != "0") {
        echo "Ce login est déja utiliser pour un autre compte.";
    }
    else {
        $pdo = connexion_bdd();
        $req = $pdo->prepare('INSERT INTO `player` (`login`, `mdp`, `date`) VALUES (:login, :mdp, :date)');
        $req->execute(array(
            'login' => $_POST['txt-login-creer'],
            'mdp' => $_POST['txt-password-creer'],
            'date' => $date
        ));
        header('Location: ../login.php');
    }
?>