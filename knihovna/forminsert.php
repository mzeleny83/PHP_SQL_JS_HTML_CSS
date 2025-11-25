<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skeleton Page</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" type="image/x-icon" href="img/favicon.png">
        <script src="js/script.js"></script>
    </head>
    <body>
        <?php
            include_once("conn.php");
        ?>

        <?php

        if(isset($_POST["submit"])){
            $nazev = mysqli_real_escape_string($conn, $_POST["nazev"]);
            $spisovatel = (int)$_POST["spisovatel"];
            $cena = (int)$_POST["cena"];
            $popis = mysqli_real_escape_string($conn, $_POST["popis"]);

            $sql = "INSERT INTO knihy (Nazev, Spisovatel, Cena, Popis) 
                VALUES 
                ('".$nazev."',".$spisovatel.",".$cena.",'".$popis."') ";

            if(akce($conn, $sql)){
                echo "Nova kniha";
            }
            else{
                echo "Chyba FATAL";
            }
        }

        ?>

        <h1>Nová kniha</h1>

        <form action="" method="post">
            <label for="nazev">Název knihy:</label><br>
            <input type="text" id="nazev" name="nazev"><br>
            <label for="spisovatel">Spisovatel:</label><br>
            <input type="number" id="spisovatel" name="spisovatel"><br>
            <label for="cena">cena:</label><br>
            <input type="number" id="cena" name="cena"><br>
            <label for="popis">popis:</label><br>
            <input type="text" id="popis" name="popis"><br>

            <input type="submit" name="submit" value="Vložit">
        </from>
       

    </body>
</html>