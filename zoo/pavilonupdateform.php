<?php
include_once "hlavicka.php";

$id = 0;
$pavilon = null;

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $sql = "SELECT * FROM pavilon WHERE Id = " . $id;
    $pavilony = fetchAll($conn, $sql);
    
    if (count($pavilony) > 0) {
        $pavilon = $pavilony[0];
    } else {
        echo "Pavilon nenalezen!";
        exit();
    }
} else {
    echo "Nepředán ID pavilonu!";
    exit();
}
?>

<h1>Editace pavilonu</h1>

<form action="pavilonupdate.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="nazev">Název:</label><br>
    <input type="text" name="nazev" id="nazev" value="<?php echo htmlspecialchars($pavilon["Nazev"]); ?>" required><br><br>
    
    <label for="popis">Popis:</label><br>
    <textarea name="popis" id="popis" rows="4" cols="50"><?php echo htmlspecialchars($pavilon["Popis"]); ?></textarea><br><br>
    
    <input type="submit" name="editovat" value="Editovat">
    <a href="pavilontabulka.php"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>