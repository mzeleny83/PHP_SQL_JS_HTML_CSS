<?php
include_once "hlavicka.php";

$poddruh_id = 0;
if (isset($_GET["poddruh"])) {
    $poddruh_id = (int)$_GET["poddruh"];
}
?>

<h1>Vložení nového jedince</h1>

<form action="jedinecinsert.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="poddruh_id" value="<?php echo $poddruh_id; ?>">
    
    <label for="popis">Popis:</label><br>
    <textarea name="popis" id="popis" rows="4" cols="50" required></textarea><br><br>
    
    <label for="pohlavi">Pohlaví:</label><br>
    <select name="pohlavi" id="pohlavi" required>
        <option value="">-- Vyberte pohlaví --</option>
        <option value="m">Samec</option>
        <option value="f">Samice</option>
    </select><br><br>
    
    <label for="poddruh">Poddruh:</label><br>
    <select name="poddruh" id="poddruh" required>
        <?php
        $sql = "SELECT * FROM poddruh ORDER BY Oznaceni";
        $poddruhy = fetchAll($conn, $sql);
        foreach ($poddruhy as $poddruh) {
            $selected = ($poddruh_id == $poddruh["Id"]) ? 'selected' : '';
            echo "<option value='" . $poddruh["Id"] . "' $selected>" . 
                 htmlspecialchars($poddruh["Oznaceni"]) . "</option>";
        }
        ?>
    </select><br><br>
    
    <label for="pecovatel">Pečovatel:</label><br>
    <select name="pecovatel" id="pecovatel">
        <option value="">-- Vyberte pečovatele --</option>
        <?php
        $sql = "SELECT * FROM zamestnanci ORDER BY Prijmeni, Jmeno";
        $zamestnanci = fetchAll($conn, $sql);
        foreach ($zamestnanci as $zamestnanec) {
            echo "<option value='" . $zamestnanec["Id"] . "'>" . 
                 htmlspecialchars($zamestnanec["Prijmeni"] . " " . $zamestnanec["Jmeno"]) . "</option>";
        }
        ?>
    </select><br><br>
    
    <label for="obrazek">Obrázek:</label><br>
    <input type="file" name="obrazek" id="obrazek" accept="image/*"><br><br>
    
    <input type="submit" name="vlozit" value="Vložit">
    <a href="jedinectabulka.php?poddruh=<?php echo $poddruh_id; ?>"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>