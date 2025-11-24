<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Heslo - v XAMPP defaultne prazdne
    $dbname = "oa__blog"; // Nazev databaze
    $port = 3307;
    // Vytvoreni spojeni
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
    // Nastaveni kodovani UTF8 - dulezite pro ceske znaky
    $conn->set_charset("utf8");
    // Kontrola spojeni s databazi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>