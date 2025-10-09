<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porovnání čísel</title>
</head>
<body>
    <h1>Porovnání dvou čísel</h1>
    
    <?php
    $a = 1;
    $b = 3;
    
    echo "A = $a, B = $b<br>";
    
    if ($a == $b) {
        echo "Obě hodnoty jsou stejné.";
    } else {
        echo "Hodnoty jsou rozdílné.<br>";
        if ($b > $a) {
            $rozdil = $b - $a;
            echo "Číslo B je větší než A o $rozdil.";
        } else {
            $rozdil = $a - $b;
            echo "Číslo A je větší než B o $rozdil.";
        }
    }
    ?>
    
</body>
</html>