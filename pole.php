<?php
$zvirata = ["kocka", "pes", "slon"];
// pristup k poslednimu prvku

echo implode(" - ", $zvirata);
echo "<br>";    

$pocet_prvku = count($zvirata);

echo "Pocet zvirat: " . $pocet_prvku;
echo "<br/>";
echo $zvirata[$pocet_prvku - 1];

echo "<br><br><br>";


// jmeno, vek, pohlavi
$hlavicka = ["Jmeno", "Vek", "Pohlavi"];
$lide = [
    ["Frantisek", 6, "muz"],
    ["Karel", 6, "muz"],
    ["Marie", 16, "zena"],
];
echo implode("__", $hlavicka);
echo "<br>";
echo implode("__", $lide[0]);

echo "<br><br><br>";


// [radek][sloupec]
echo $lide[0][0];
echo "<br/>";
// posledni zanam, vek
$pocet_zaznamu = count($lide);
echo $lide[$pocet_zaznamu - 1][1];


$rostlina = [
    "Jmeno" => "Albert",
    "Druh" => "tulipán",
    "Zalito" => true,
];
echo "<br/><br/><br/>";
echo $rostlina["Druh"];



echo "<br/><br/><br/>";

$rostliny = [
    [
        "Jmeno" => "Albert",
        "Druh" => "tulipán",
        "Zalito" => true,
    ],
    [
        "Jmeno" => "Karel",
        "Druh" => "Aloe vera",
        "Zalito" => true,
    ]
];

echo $rostliny[1]["Jmeno"] . " je " . $rostliny[1]["Druh"];
echo "<br/>";

// isset
if (isset($rostliny[0]["Jmeno"])) {
    echo $rostliny[0]["Jmeno"];
} else {
    echo "Prvnimu zaznamu chybi jmeno";
}

echo "<br/>";
$a;
$a = "Ahoj";
if (isset($a)) {
    echo $a;
} else {
    echo "promenna a neni definovana";
}


echo "<br/><br/><br/>";
// funkce explode
$veta = "Dnes je hezky vecer.";
$slova = explode(" ",  string: $veta);
echo $slova[1];

echo "<br/><br/><br/>";

if(in_array("pes", $slova)) {
    echo "Slovo pes je ve vete";
} else {
    echo "Slovo pes neni ve vete.";
}


echo "<br/><br/><br/>";
// ukazka upravovani pole
$cisla = [1, 2, 3];

$cisla[0] = $cisla[0] . ".";

$cisla[1] = "Moje oblibene cislo je: " . $cisla[1];

echo $cisla[0];
echo "<br/>";
echo $cisla[1];

// pridani prvku
$cisla[4] = 4;
echo "<br/>";
echo $cisla[4];
?>