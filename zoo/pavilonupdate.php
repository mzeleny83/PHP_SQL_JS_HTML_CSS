<?php
include_once "conn.php";

if (isset($_POST["editovat"])) {
    $id = (int)$_POST["id"];
    $nazev = mysqli_real_escape_string($conn, $_POST["nazev"]);
    $popis = mysqli_real_escape_string($conn, $_POST["popis"]);
    
    if ($id > 0) {
        $sql = "UPDATE pavilon SET Nazev = '$nazev', Popis = '$popis' WHERE Id = $id";
        
        if (akce($conn, $sql)) {
            header("Location: pavilontabulka.php?success=update");
            exit();
        } else {
            header("Location: pavilontabulka.php?error=Chyba při aktualizaci záznamu");
            exit();
        }
    } else {
        header("Location: pavilontabulka.php?error=Nepředáno ID pavilonu");
        exit();
    }
} else {
    header("Location: pavilontabulka.php");
    exit();
}
?>