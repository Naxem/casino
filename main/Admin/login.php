<?php
    session_start();
    $_SESSION["ifCreationCompte"] = $_GET["conexion"];
    $code = random_int(1000, 9999);
    $_SESSION["captcha"] = $code;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../css/login.css">
    <!--Autre-->
    <title>Connexion</title>
</head>
<body>
<?php if($_SESSION["ifCreationCompte"] == 1) { ?>
        <div class="globale">
            <form action="login_authentification.php" method="POST">
                <?php if(!empty($_SESSION["status"]) && $_SESSION['status'] != '') { ?>
                <div class="erreur"><?= $_SESSION["status"] ?></div>
                <?php } ?>

                <div class="input">
                    <label for="txt-login">Votre identifiant</label>
                    <input type="text" name="txt-login" required>
                </div>
                
                <div class="input">
                    <label for="txt-password">Votre mot de passe</label>
                    <input type="password" name="txt-password" required>
                </div>

                <div class="div_captcha">
                    <input type="text" maxlength="4" minlength="1" name="reponse" pattern="[0-9]*" placeholder="Réponse au captcha">
                    <div class="chiffre">
                        <?= $code ?>
                    </div>
                </div>
                
                <input type="submit" name="btn-connexion" value="Connexion" class="bouton">
                <a href="login?conexion=0">Créer un compte</a>
            </form>
        </div>
    <?php } elseif($_SESSION["ifCreationCompte"] == 0) {?>
        <div class="globale">
            <form action="login_authentification.php" method="POST">
                <?php if(!empty($_SESSION["status"]) && $_SESSION['status'] != '') { ?>
                <div class="erreur"><?= $_SESSION["status"] ?></div>
                <?php } ?>

                <div class="input">
                    <label for="txt-login">Votre identifiant</label>
                    <input type="text" name="txt-login" required>
                </div>
                
                <div class="input">
                    <label for="txt-password">Votre mot de passe</label>
                    <input type="password" name="txt-password" required>
                </div>

                <div class="div_captcha">
                    <input type="text" maxlength="4" minlength="1" name="reponse" pattern="[0-9]*" placeholder="Réponse au captcha">
                    <div class="chiffre">
                        <?= $code ?>
                    </div>
                </div>
                
                <input type="submit" name="btn-creer" value="Créer" class="bouton">
                <a href="login?conexion=1">Conexion</a>
            </form>
        </div>
    <?php }else { ?>
        <form>
            <p>Error loading page</p>
        </form>
    <?php } ?>
</body>
</html>