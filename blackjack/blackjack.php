<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Script -->
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="blackjack.css">
    <!-- Autre -->
    <title id="title">BlackJack</title>
</head>
<body>
    <section class="s-btn">
        <div class="btn_tire_card" onclick="tireCard()"><p id="hit">Hit</p></div>
        <div class="btn_tire_card" onclick="stopCard()"><p id="stand">Stand</p></div>
        <div class="btn_tire_card" onclick="start()"><p id="start">Start</p></div>
        <div class="btn_aff_regle" onclick="affRegle()"><p id="rule">Rule</p></div>
    </section>

    <section class="s-cardCroupier">
        <div id="d-pointsCroupier"></div>
        <div id="cardCroupier" class="d-cardCroupier"></div>
    </section>

    <section class="s-card">
        <div id="d-pointsPlayer"></div>
        <div id="card" class="d-card"></div>
    </section>
    <script src="langue.js"></script>
    <script src="blackjack.js"></script>
</body>
</html>