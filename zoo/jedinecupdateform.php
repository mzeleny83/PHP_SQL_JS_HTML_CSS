<?php
include_once "hlavicka.php";

$id = 0;
$jedinec = null;
$poddruhid = 0;

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $sql = "SELECT * FROM jedinec WHERE Id = " . $id;
    $jedinci = fetchAll($conn, $sql);
    
    if (count($jedinci) > 0) {
        $jedinec = $jedinci[0];
        $poddruhid = $jedinec["Poddruh"];
    } else {
        echo "Jedinec nenalezen!";
        exit();
    }
} else {
    echo "Nepředán ID jedince!";
    exit();
}
?>

<h1>Editace jedince</h1>

<form action="jedinecupdate.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="poddruh_id" value="<?php echo $poddruhid; ?>">
    
    <label for="popis">Popis:</label><br>
    <textarea name="popis" id="popis" rows="4" cols="50" required><?php echo htmlspecialchars($jedinec["Popis"]); ?></textarea><br><br>
    
    <label for="pohlavi">Pohlaví:</label><br>
    <select name="pohlavi" id="pohlavi" required>
        <option value="m" <?php echo ($jedinec["Pohlavi"] == 'm') ? 'selected' : ''; ?>>Samec</option>
        <option value="f" <?php echo ($jedinec["Pohlavi"] == 'f') ? 'selected' : ''; ?>>Samice</option>
    </select><br><br>
    
    <label for="pecovatel">Pečovatel:</label><br>
    <select name="pecovatel" id="pecovatel">
        <option value="">-- Vyberte pečovatele --</option>
        <?php
        $sql = "SELECT * FROM zamestnanci ORDER BY Prijmeni, Jmeno";
        $zamestnanci = fetchAll($conn, $sql);
        foreach ($zamestnanci as $zamestnanec) {
            $selected = ($jedinec["Pecovatel"] == $zamestnanec["Id"]) ? 'selected' : '';
            echo "<option value='" . $zamestnanec["Id"] . "' $selected>" . 
                 htmlspecialchars($zamestnanec["Prijmeni"] . " " . $zamestnanec["Jmeno"]) . "</option>";
        }
        ?>
    </select><br><br>
    
    <?php if (!empty($jedinec["Obrazek"])): ?>
        <label>Současný obrázek:</label><br>
        <img src="uploads/<?php echo htmlspecialchars($jedinec["Obrazek"]); ?>" alt="Obrázek jedince" style="max-width: 200px;"><br><br>
    <?php endif; ?>
    
    <label for="obrazek">Nový obrázek:</label><br>
    <input type="file" name="obrazek" id="obrazek" accept="image/*"><br><br>
    
    <input type="submit" name="editovat" value="Editovat">
    <a href="jedinectabulka.php?poddruh=<?php echo $poddruhid; ?>"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>