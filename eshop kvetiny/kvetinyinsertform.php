
<?php
    include_once "header.php";
?>


<h1>Nová květina</h1>

<div>
    <form action="kvetinyinsert.php" method="POST">
        <label for="nazev">Název:</label><br>
        <input type="text" id="nazev" name="nazev"><br>
        <label for="cena">Cena:</label><br>
        <input type="number" id="cena" name="cena"><br>
        <label for="mnozstvi">Množství:</label><br>
        <input type="number" id="mnozstvi" name="mnozstvi"><br>

        <input type="submit" name="vlozit" value="Vložit">
    </form>

</div>

<?php
    include_once "footer.php";
?>