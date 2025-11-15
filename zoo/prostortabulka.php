<?php
include_once "hlavicka.php";
?>

<h1>Prostory</h1>

<table>
    <tr>
        <th>Název</th>
        <th>Rozloha (m²)</th>
        <th>Pavilon</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $sql = "SELECT pr.*, p.Nazev as pavilon_nazev
            FROM prostor pr 
            LEFT JOIN pavilon p ON p.Id = pr.Pavilon
            ORDER BY pr.Nazev";
    
    $prostory = fetchAll($conn, $sql);
    
    foreach ($prostory as $prostor) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($prostor["Nazev"]) . "</td>";
        echo "<td>" . number_format($prostor["Rozloha"], 2) . "</td>";
        echo "<td>" . htmlspecialchars($prostor["pavilon_nazev"]) . "</td>";
        echo "<td><a href='prostorupdateform.php?id=".$prostor["Id"]."'>Upravit</a></td>";
        echo "<td><a href='prostordeleteform.php?id=".$prostor["Id"]."'>Smazat</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href='prostorinsertform.php'>Vložit nový prostor</a>

<?php
include_once "paticka.php";
?>