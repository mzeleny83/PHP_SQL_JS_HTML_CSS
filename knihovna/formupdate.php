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
        $idknihy = 1;
        if(isset($_GET["idknihy"])){
            $idknihy = (int)$_GET["idknihy"];
        }

        if(isset($_POST["submit"])){
            $nazev = $_POST["nazev"];
            $spisovatel = (int)$_POST["spisovatel"];
            $cena = (int)$_POST["cena"];
            $popis = $_POST["popis"];

            $sql = "UPDATE knihy
            SET Nazev = ?, Spisovatel = ?, Cena = ?, Popis = ?
            WHERE Id = ? ";

            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param("siisi", $nazev, $spisovatel, $cena, $popis, $idknihy);
            $result = $stmt->execute();
            if ($result){
                echo "Kniha upravena";
            }
            else{
                echo "Error ". $stmt->error;
            }
            
        }

        ?>

        <h1>Úprava knihy</h1>

        <form action="" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $idknihy ?>"><br>
            <label for="nazev">Název knihy:</label><br>
            <input type="text" id="nazev" name="nazev"><br>
            <label for="spisovatel">Spisovatel:</label><br>
            <select  id="spisovatel" name="spisovatel">
                <?php

                $sql = " SELECT Id, Jmeno, Prijmeni FROM spisovatele ";
                $spisovatele = fetchAll($conn, $sql);

                foreach($spisovatele as $spisovatel){
                    echo "<option value='".$spisovatel["Id"]."'>"
                        .$spisovatel["Jmeno"]. " ".$spisovatel["Prijmeni"]."</option>";
                }

                ?>
            </select><br>
            <label for="cena">cena:</label><br>
            <input type="number" id="cena" name="cena"><br>
            <label for="popis">popis:</label><br>
            <input type="text" id="popis" name="popis"><br>

            <input type="submit" name="submit" value="Upravit">
        </from>
       

    </body>
</html>