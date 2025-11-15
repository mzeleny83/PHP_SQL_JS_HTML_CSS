
<?php
include_once "hlavicka.php";
?>

<h1> Poddruhy </h1>

<?php

if (isset($_GET["success"])){
    if ($_GET["success"] == "delete"){
        echo "<div class='success'>"."Záznam úspěšně smazán"."</div>";
    }
}

?>

<?php

$sql = " SELECT * FROM poddruh";

$poddruhy = fetchAll($conn, $sql);

foreach ($poddruhy as $poddruh){
    echo "<a href='jedinectabulka.php?poddruh=".$poddruh["Id"]."'><div class='kategoriebox'>";
    echo "<h3>" . htmlspecialchars($poddruh["Oznaceni"]) . "</h3>";
    echo "<p>" . htmlspecialchars($poddruh["Popis"]) . "</p>";
    echo "</div></a>";
}

?>

<?php
include_once "paticka.php";
?>