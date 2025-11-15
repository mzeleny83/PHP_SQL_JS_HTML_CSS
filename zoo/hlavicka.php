<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skeleton Page</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="img/favicon.png">
        <script src="js/script.js"></script>
    </head>
    <body>

        <?php
        include_once "conn.php"; 
        ?>

        <nav>
            <a href="index.php"> Úvodní strana </a>
            <a href="poddruhtabulka.php"> Seznam poddruhů </a>
            <a href="zamestnancitabulka.php"> Seznam zaměstnanců </a>
            <a href="pavilontabulka.php"> Pavilony </a>
            <a href="prostortabulka.php"> Prostory </a>
            <a href="stravatabulka.php"> Strava </a>
        </nav>
