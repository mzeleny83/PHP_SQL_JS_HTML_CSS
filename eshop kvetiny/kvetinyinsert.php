
<?php

include_once "conn.php";

if (isset($_POST["vlozit"])){
    $sql = " INSERT INTO `kvetiny`
        (`aktivni`, `nazev`, `cena`, `mnozstvi`)
        VALUES
        (?,?,?,?) ";

    $aktivni = 1;

    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param("isii", $aktivni,$_POST["nazev"],$_POST["cena"],$_POST["mnozstvi"]);
    if ($stmt->execute()){
        header("Location: kvetinytabulka.php");
    }else{
        echo "Chyba odeslání dat : " . $stmt->error;
        die();
    }
}else{
    echo "Neodeslána data!";
    die();
}


?>