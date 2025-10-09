<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podmínky IF a SWITCH</title>
</head>
<body>
    <h1>Podmínky IF a SWITCH</h1>
    
    <h2>1. Čísla 0-6 na slova</h2>
    <?php
    $a = 6;
    
    // IF/ELSEIF/ELSE
    echo "<h3>IF/ELSEIF/ELSE:</h3>";
    if ($a == 0) {
        echo "nula";
    } elseif ($a == 1) {
        echo "jedna";
    } elseif ($a == 2) {
        echo "dva";
    } elseif ($a == 3) {
        echo "tři";
    } elseif ($a == 4) {
        echo "čtyři";
    } elseif ($a == 5) {
        echo "pět";
    } elseif ($a == 6) {
        echo "šest";
    } else {
        echo "neznámé číslo";
    }
    
    // SWITCH
    echo "<h3>SWITCH:</h3>";
    switch ($a) {
        case 0:
            echo "nula";
            break;
        case 1:
            echo "jedna";
            break;
        case 2:
            echo "dva";
            break;
        case 3:
            echo "tři";
            break;
        case 4:
            echo "čtyři";
            break;
        case 5:
            echo "pět";
            break;
        case 6:
            echo "šest";
            break;
        default:
            echo "neznámé číslo";
    }
    ?>
    
    <h2>2. Zkratky zvířat</h2>
    <?php
    $b = "za";
    
    // IF/ELSEIF/ELSE
    echo "<h3>IF/ELSEIF/ELSE:</h3>";
    if ($b == "za") {
        echo "zajíc";
    } elseif ($b == "kr") {
        echo "krtek";
    } elseif ($b == "je") {
        echo "jelen";
    } else {
        echo "neznámá zkratka";
    }
    
    // SWITCH
    echo "<h3>SWITCH:</h3>";
    switch ($b) {
        case "za":
            echo "zajíc";
            break;
        case "kr":
            echo "krtek";
            break;
        case "je":
            echo "jelen";
            break;
        default:
            echo "neznámá zkratka";
    }
    ?>
    
</body>
</html>