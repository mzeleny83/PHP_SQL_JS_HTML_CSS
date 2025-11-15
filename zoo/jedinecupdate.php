<?php
include_once "conn.php";

if (isset($_POST["editovat"])) {
    $id = (int)$_POST["id"];
    $popis = mysqli_real_escape_string($conn, $_POST["popis"]);
    $pohlavi = $_POST["pohlavi"];
    $pecovatel = !empty($_POST["pecovatel"]) ? (int)$_POST["pecovatel"] : "NULL";
    $poddruh_id = (int)$_POST["poddruh_id"];
    
    $obrazek_nazev = "";
    
    // Zpracování nahrání obrázku
    if (isset($_FILES["obrazek"]) && $_FILES["obrazek"]["error"] == 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES["obrazek"]["name"], PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        
        if (in_array($file_extension, $allowed_extensions)) {
            $obrazek_nazev = uniqid() . "." . $file_extension;
            $upload_path = $upload_dir . $obrazek_nazev;
            
            if (move_uploaded_file($_FILES["obrazek"]["tmp_name"], $upload_path)) {
                // Obrázek byl úspěšně nahrán
            } else {
                header("Location: jedinectabulka.php?poddruh=$poddruh_id&error=Chyba při nahrávání obrázku");
                exit();
            }
        } else {
            header("Location: jedinectabulka.php?poddruh=$poddruh_id&error=Nepodporovaný formát obrázku");
            exit();
        }
    }
    
    if ($id > 0) {
        if (!empty($obrazek_nazev)) {
            $sql = "UPDATE jedinec SET Popis = '$popis', Pohlavi = '$pohlavi', Pecovatel = $pecovatel, Obrazek = '$obrazek_nazev' WHERE Id = $id";
        } else {
            $sql = "UPDATE jedinec SET Popis = '$popis', Pohlavi = '$pohlavi', Pecovatel = $pecovatel WHERE Id = $id";
        }
        
        if (akce($conn, $sql)) {
            header("Location: jedinectabulka.php?poddruh=$poddruh_id&success=update");
            exit();
        } else {
            header("Location: jedinectabulka.php?poddruh=$poddruh_id&error=Chyba při aktualizaci záznamu");
            exit();
        }
    } else {
        header("Location: jedinectabulka.php?poddruh=$poddruh_id&error=Nepředáno ID jedince");
        exit();
    }
} else {
    header("Location: poddruhtabulka.php");
    exit();
}
?>