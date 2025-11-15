<?php
include_once "hlavicka.php";
?>

<h1>Seznam zaměstnanců</h1>

<table>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Pozice</th>
    </tr>
    <?php
    $sql = "SELECT * FROM zamestnanci ORDER BY Prijmeni, Jmeno";
    $zamestnanci = fetchAll($conn, $sql);
    
    foreach ($zamestnanci as $zamestnanec) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($zamestnanec["Jmeno"]) . "</td>";
        echo "<td>" . htmlspecialchars($zamestnanec["Prijmeni"]) . "</td>";
        echo "<td>" . htmlspecialchars($zamestnanec["Pozice"]) . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include_once "paticka.php";
?>