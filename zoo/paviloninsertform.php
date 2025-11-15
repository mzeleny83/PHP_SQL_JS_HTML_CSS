<?php
include_once "hlavicka.php";
?>

<h1>Vložení nového pavilonu</h1>

<form action="paviloninsert.php" method="POST">
    <label for="nazev">Název:</label><br>
    <input type="text" name="nazev" id="nazev" required><br><br>
    
    <label for="popis">Popis:</label><br>
    <textarea name="popis" id="popis" rows="4" cols="50"></textarea><br><br>
    
    <input type="submit" name="vlozit" value="Vložit">
    <a href="pavilontabulka.php"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>