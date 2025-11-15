
<?php
include_once "hlavicka.php";
?>

<h1> Zvířata 

<?php
$poddruhid = 0;
$prostorid = 0;

if (isset($_GET["poddruh"])){
    $poddruhid = (int)$_GET["poddruh"];
    $sql = " SELECT * FROM poddruh WHERE Id=". $poddruhid;
    $poddruhy = fetchAll($conn, $sql);
    foreach ($poddruhy as $poddruh){
        echo " - " . htmlspecialchars($poddruh["Oznaceni"]);
    }
} elseif (isset($_GET["prostor"])){
    $prostorid = (int)$_GET["prostor"];
    $sql = " SELECT * FROM prostor WHERE Id=". $prostorid;
    $prostory = fetchAll($conn, $sql);
    foreach ($prostory as $prostor){
        echo " - " . htmlspecialchars($prostor["Nazev"]);
    }
} else {
    echo " - všechna";
}

?>

</h1>

<?php
if (isset($_GET["success"])) {
    if ($_GET["success"] == "delete") {
        echo "<div class='success'>Záznam úspěšně smazán</div>";
    } elseif ($_GET["success"] == "update") {
        echo "<div class='success'>Záznam úspěšně aktualizován</div>";
    } elseif ($_GET["success"] == "insert") {
        echo "<div class='success'>Záznam úspěšně vložen</div>";
    }
}
if (isset($_GET["error"])) {
    echo "<div class='error'>" . htmlspecialchars($_GET["error"]) . "</div>";
}
?>

<table>
    <tr>
        <th>Obrázek</th>
        <th>Popis</th>
        <th>Pohlaví</th>
        <th>Poddruh</th>
        <th>Prostor</th>
        <th>Pečovatel</th>
        <th></th>
        <th></th>
    </tr>
<?php
$sql = " SELECT jedinec.`Id`, jedinec.`Pohlavi`, jedinec.`Popis`, jedinec.`Obrazek`,
    CONCAT(zamestnanci.Prijmeni,' ' , zamestnanci.Jmeno) AS Pecovatel,
    poddruh.Oznaceni as poddruh_nazev, prostor.Nazev as prostor_nazev
    FROM `jedinec`
    LEFT JOIN zamestnanci ON zamestnanci.Id = jedinec.Pecovatel
    LEFT JOIN poddruh ON poddruh.Id = jedinec.Poddruh
    LEFT JOIN prostor ON prostor.Id = jedinec.Prostor ";

if ($poddruhid > 0) {
    $sql .=  " WHERE jedinec.poddruh=" . $poddruhid;
} elseif ($prostorid > 0) {
    $sql .=  " WHERE jedinec.prostor=" . $prostorid;
}

$results = fetchAll($conn, $sql);

foreach ($results as $jedinec){
    $pohlavi = $jedinec["Pohlavi"];
    if ($pohlavi == "f"){
        $pohlavi = "samička";
    }elseif ($pohlavi == "m"){
        $pohlavi = "samec";
    }
    echo "<tr>";
    echo "<td>";
    if (!empty($jedinec["Obrazek"])) {
        echo "<img src='uploads/" . htmlspecialchars($jedinec["Obrazek"]) . "' alt='Obrázek jedince' style='max-width: 100px; max-height: 100px;'>";
    } else {
        echo "Bez obrázku";
    }
    echo "</td>";
    echo "<td>" . htmlspecialchars($jedinec["Popis"]) . "</td>";
    echo "<td>" . htmlspecialchars($pohlavi) . "</td>";
    echo "<td>" . htmlspecialchars($jedinec["poddruh_nazev"]) . "</td>";
    echo "<td>" . htmlspecialchars($jedinec["prostor_nazev"]) . "</td>";
    echo "<td>" . htmlspecialchars($jedinec["Pecovatel"]) . "</td>";
    echo "<td><a href='jedinecupdateform.php?id=".$jedinec["Id"]."'>Upravit</a></td>";
    echo "<td><a href='jedinecdeleteform.php?id=".$jedinec["Id"]."'>Smazat</a></td>";
    echo "</tr>";
}

?>
</table>
<a href='jedinecinsertform.php?poddruh=<?php echo $poddruhid; ?>&prostor=<?php echo $prostorid; ?>'>Vložit nový</a>

<?php
include_once "paticka.php";
?>