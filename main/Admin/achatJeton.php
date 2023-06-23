<?php
    require ('requete.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/achatJeton.css">
    <link rel="stylesheet" href="../CSS/navFooter.css">
    <title>Acheter des Jetons</title>
</head>
<header>
    <nav>
        <div class="div-title">
            <a href="../index.php" id="Accueil" class="nav-icon" aria-label="visit homepage" aria-current="page">
                <span>Casino by Naxem</span>
            </a>
        </div>
        
        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
            </button>
            <div class="navlinks-container">
                <a href="../index" aria-current="home-page">Accueil</a>
                <a href="../resources/pages/poker" aria-current="Poker">Poker</a>
                <a href="../../blackjack/blackjack" aria-current="Blackjack">Blackjack</a>
                <a href="../Admin/login?conexion=1" aria-current="Login">
                    <?php if ( $_SESSION["status"] != "") {echo $_SESSION["pseudo"];} else {echo "Login";} ?>
                </a>
            </div>
        </div>
    </nav>
    <script src="JS/navBare.js"></script>
</header>
<body>
    <div class="main">
        <div class="div-achat">
            <?php 
                if ($_SESSION["niveau"] == 0) {echo "Vous avez pas assez de niv !";}
                else {
            ?>
            <a href="?achat=1000" class="btn-achatJ">
                <p>1 000 jetons</p>
                <img src="" alt="Img jeton">
                <p>1 niv</p>
            </a>
            <?php } ?>
        </div>

        <div class="div-achat">
            <?php 
                if ($_SESSION["niveau"] < 2) {echo "Vous avez pas assez de niv !";}
                else {
            ?>
            <a href="?achat=5000" class="btn-achatJ">
                <p>5 000 jetons</p>
                <img src="" alt="Img jeton">
                <p>2 niv</p>
            </a>
            <?php } ?>
        </div>

        <div class="div-achat">
            <?php 
                if ($_SESSION["niveau"] < 3) {echo "Vous avez pas assez de niv !";}
                else {
            ?>
            <a href="?achat=15000" class="btn-achatJ">
                <p>15 000 jetons</p>
                <img src="" alt="Img jeton">
                <p>3 niv</p>
            </a>
            <?php } ?>
        </div>

        <div class="div-achat">
            <?php 
                if ($_SESSION["niveau"] < 5) {echo "Vous avez pas assez de niv !";}
                else {
            ?>
            <a href="?achat=50000" class="btn-achatJ">
                <p>50 000 jetons</p>
                <img src="" alt="Img jeton">
                <p>5 niv</p>
            </a>
            <?php } ?>
        </div>

        <div class="div-achat">
            <?php 
                if ($_SESSION["niveau"] < 10) {echo "Vous avez pas assez de niv !";}
                else {
            ?>
            <a href="?achat=150000" class="btn-achatJ">
                <p>150 000 jetons</p>
                <img src="" alt="Img jeton">
                <p>10 niv</p>
            </a>
            <?php } ?>
        </div>
    </div>
</body>
</html>