<?php
include_once "hlavicka.php";
?>

<h1>Strava</h1>

<table>
    <tr>
        <th>Název</th>
        <th>Typ</th>
        <th>Popis</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $sql = "SELECT * FROM strava ORDER BY Nazev";
    $stravy = fetchAll($conn, $sql);
    
    foreach ($stravy as $strava) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($strava["Nazev"]) . "</td>";
        echo "<td>" . htmlspecialchars($strava["Typ"]) . "</td>";
        echo "<td>" . htmlspecialchars($strava["Popis"]) . "</td>";
        echo "<td><a href='stravaupdateform.php?id=".$strava["Id"]."'>Upravit</a></td>";
        echo "<td><a href='stravadeleteform.php?id=".$strava["Id"]."'>Smazat</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href='stravainsertform.php'>Vložit novou stravu</a>

<?php
include_once "paticka.php";
?>