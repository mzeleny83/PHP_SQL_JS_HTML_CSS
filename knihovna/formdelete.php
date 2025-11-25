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
        $idknihy = 0;
        if(isset($_GET["idknihy"])){
            $idknihy = (int)$_GET["idknihy"];
        }

        if(isset($_POST["submit"])){

            $sql = "DELETE FROM knihy
            WHERE Id = ? ";

            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param("i", $idknihy);
            $result = $stmt->execute();
            if ($result){
                echo "Kniha smazána";
            }
            else{
                echo "Error ". $stmt->error;
            }
            
        }elseif(isset($_POST["back"])){
            header("Location: tabulka.php");
            exit();
        }

        ?>

        <h1>Smazání knihy</h1>

        <form action="" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $idknihy ?>"><br>

            <h4>OPRAVDU CHCETE SMAZAT KNIHU?</h4>

            <input type="submit" name="submit" value="Smazat">
            <input type="submit" name="back" value="Zpět">
        </from>
       

    </body>
</html>