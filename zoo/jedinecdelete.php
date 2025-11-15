<?php

include_once "conn.php";

if (isset($_POST["smazat"])){
    $id = (int)$_POST["id"];
    if ($id > 0){
        // Získání poddruh_id před smazáním
        $poddruh_sql = "SELECT Poddruh FROM jedinec WHERE Id = $id";
        $poddruh_result = fetchAssoc($conn, $poddruh_sql);
        $poddruh_id = $poddruh_result ? $poddruh_result['Poddruh'] : 0;
        
        $sql = " DELETE FROM jedinec WHERE Id = " . $id;
        if (akce($conn, $sql)){
            header("Location: jedinectabulka.php?poddruh=$poddruh_id&success=delete");
            exit();
        }else{
            header("Location: jedinectabulka.php?poddruh=$poddruh_id&error=Chyba smazání záznamu");
            exit();
        }
    }
    else{
        header("Location: poddruhtabulka.php?error=Nepředáno číslo jedince");
        exit();
    }
}else{
    header("Location: poddruhtabulka.php");
    exit();
}

?>