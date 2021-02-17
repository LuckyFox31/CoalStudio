<head>

    <!-- META -->
    <?= meta(); ?>

    <!-- SCRIPT -->
    <?= script(); ?>

    <!-- ICON -->
    <?= icon(); ?>

    <title>CoalStudio - Jeux Vidéos</title>
    <link rel="stylesheet" href="public/assets/style/css/games.css">
</head>
<?php

navbar();

include ROOT . 'view/html/games.html';