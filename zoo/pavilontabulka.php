<?php
include_once "hlavicka.php";
?>

<h1>Pavilony</h1>

<table>
    <tr>
        <th>Název</th>
        <th>Popis</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $sql = "SELECT * FROM pavilon ORDER BY Nazev";
    $pavilony = fetchAll($conn, $sql);
    
    foreach ($pavilony as $pavilon) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($pavilon["Nazev"]) . "</td>";
        echo "<td>" . htmlspecialchars($pavilon["Popis"]) . "</td>";
        echo "<td><a href='pavilonupdateform.php?id=".$pavilon["Id"]."'>Upravit</a></td>";
        echo "<td><a href='pavilondeleteform.php?id=".$pavilon["Id"]."'>Smazat</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href='paviloninsertform.php'>Vložit nový pavilon</a>

<?php
include_once "paticka.php";
?>