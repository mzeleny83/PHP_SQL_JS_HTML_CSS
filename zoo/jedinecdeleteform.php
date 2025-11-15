
<?php
include_once "hlavicka.php";
?>

<h1> Mazání záznamu </h1>

<form action="jedinecdelete.php" method="POST">
    <h2> Opravdu chcete smazat záznam?</h2>


    <?php
    $id = 0;
    if (isset($_GET["id"])){
        $id = (int)$_GET["id"];
        $sql = " SELECT * FROM jedinec WHERE Id=". $id;

        $jedinci = fetchAll($conn, $sql);

        foreach ($jedinci as $jedinec){
            echo "<div class='textinfo'>" . htmlspecialchars($jedinec["Popis"]) . "</div>";
            echo "<input type='hidden' name='id' value='".$id."'>";
        }
    }
    else{
        echo "Nepředán záznam!!!";
        exit();
    }

    ?>

    <input type="submit" name="smazat" value="Smazat">
    <?php
    // Získání poddruh_id pro správné přesměrování
    $poddruh_sql = "SELECT Poddruh FROM jedinec WHERE Id = $id";
    $poddruh_result = fetchAssoc($conn, $poddruh_sql);
    $poddruh_id = $poddruh_result ? $poddruh_result['Poddruh'] : 0;
    ?>
    <a href="jedinectabulka.php?poddruh=<?php echo $poddruh_id; ?>"><input type="button" value="Zpět"></a>
</form>

<?php
include_once "paticka.php";
?>