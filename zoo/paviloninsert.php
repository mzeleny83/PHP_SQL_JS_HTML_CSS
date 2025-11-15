<?php
include_once "conn.php";

if (isset($_POST["vlozit"])) {
    $nazev = mysqli_real_escape_string($conn, $_POST["nazev"]);
    $popis = mysqli_real_escape_string($conn, $_POST["popis"]);
    
    $sql = "INSERT INTO pavilon (Nazev, Popis) VALUES ('$nazev', '$popis')";
    
    if (akce($conn, $sql)) {
        header("Location: pavilontabulka.php?success=insert");
        exit();
    } else {
        header("Location: pavilontabulka.php?error=Chyba při vkládání záznamu");
        exit();
    }
} else {
    header("Location: pavilontabulka.php");
    exit();
}
?>