<?php
include_once "hlavicka.php";

$id = 0;
if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $sql = "SELECT * FROM pavilon WHERE Id = " . $id;
    $pavilony = fetchAll($conn, $sql);
    
    if (count($pavilony) == 0) {
        echo "Pavilon nenalezen!";
        exit();
    }
    $pavilon = $pavilony[0];
} else {
    echo "Nepředán ID pavilonu!";
    exit();
}
?>

<h1>Mazání pavilonu</h1>

<form action="pavilondelete.php" method="POST">
    <h2>Opravdu chcete smazat pavilon?</h2>
    
    <div class='textinfo'><?php echo htmlspecialchars($pavilon["Nazev"]); ?></div>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    
    <input type="submit" name="smazat" value="Smazat">
    <a href="pavilontabulka.php"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>