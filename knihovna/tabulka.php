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

        <h1>Naše knihy</h1>


        <table>
            <tr>
                <th>ID</th>
                <th>Název</th>
                <th>Spisovatel</th>
                <th>Cena</th>
                <th></th>
            </tr>

            <?php

            $sql = " SELECT `Id`, `Nazev`, `Spisovatel`, `Cena`, `Popis` FROM `knihy` ";

            $knihy = fetchAll($conn, $sql);

            //$result = mysqli_query( $conn, $sql );
            //$knihy = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach($knihy as $kniha){
                echo "<tr>";
                echo "<td>".$kniha["Id"]."</td>";
                echo "<td>".$kniha["Nazev"]."</td>";
                echo "<td>".$kniha["Spisovatel"]."</td>";
                echo "<td>".$kniha["Cena"]."</td>";
                echo "<td><a href='formdelete.php?idknihy=".$kniha["Id"]."'>Smazat</a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    </body>
</html>