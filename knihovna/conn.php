<?php

$servername = "localhost"; 
$username = "root"; 
$password = "";//xampp má defaultně nastavené heslo prázdné 
$dbname = "oa_lekce"; 
//Vytvoření spojení 
$conn = mysqli_connect( $servername, $username, $password, $dbname ); 

//Kontrola spojení 
if(!$conn){ 
    die("Connection failed: " . mysqli_connect_error()); 
} 

function fetchAssoc($conn, $sql){
    $result = mysqli_query( $conn, $sql );
    $pole = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //echo $pole[ "Text" ];
    return $pole;
}

function fetch($conn, $sql){
    $result = mysqli_query( $conn, $sql );
    $pole = mysqli_fetch_array( $result, MYSQLI_NUM);
    //echo $pole[1];
    return $pole;
}

function fetchAll( $conn, $sql){
    $pole = [];
    try{
        $result = mysqli_query( $conn, $sql );
        if(!$result){
            echo($e->getMessage());
            return $pole;
        }
        $pole = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //echo $pole[0]["Text"];
    }catch(Exception $e){
        echo($e->getMessage());
    }
    return $pole;
}

function akce($conn, $sql){
    try{
        if (mysqli_query($conn, $sql)) {
              return true;
        }
        else{
            return false;
        }
    }catch(Exception $e){
        echo($e->getMessage());
        return false;
    }
}


?>