<?php
include_once "conn.php";

if (isset($_POST["smazat"])) {
    $id = (int)$_POST["id"];
    
    if ($id > 0) {
        $sql = "DELETE FROM pavilon WHERE Id = " . $id;
        
        if (akce($conn, $sql)) {
            header("Location: pavilontabulka.php?success=delete");
            exit();
        } else {
            header("Location: pavilontabulka.php?error=Chyba při mazání záznamu");
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