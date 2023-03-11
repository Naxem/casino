<?php
    session_start();
    if ($_SESSION["error"] == "1")
    {
        $_SESSION["error"] = "0";
    } else {
        $_SESSION["status"] = "";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        $_SESSION["error"] = "0";
    ?>

    <div>
        <div>
            <form action="Admin/testLogin.php" method="POST">
                <label>Connecter vous :</label>
                <p>Login : <input type="text" name="txt-login" placeholder="Entrez un login"></p>
                <p>Mot de passe : <input type="password" name="txt-password" placeholder="Entrez un mot de passe"></p>
                <p><input type="submit" name="btn-connexion" value="Conexion"></p>
            </form>

            <form action="Admin/requete.php" method="POST">
                <input type="submit" name="btn-deconexion" value="déconexion">
            </form>
        </div>

        <form action="Admin/update.php" method="POST">
            <label>Créer un compte :</label>
            <p>Login : <input type="text" name="txt-login-creer" placeholder="Entrez un login"></p>
            <p>Mot de passe : <input type="password" name="txt-password-creer" placeholder="Entrez un mot de passe"></p>
            <p><input type="submit" name="btn-creer" value="Créer"></p>
        </form>
    </div>
</body>
</html>