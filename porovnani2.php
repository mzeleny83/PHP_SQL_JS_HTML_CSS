<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porovnání čísel</title>
</head>
<body>
    <h1>Porovnání čísel</h1>
    
    <?php
    $a = 2;
    $b = 2;
    
    if ($a > $b) {
        echo "Číslo A ($a) je větší než číslo B ($b).";
    } elseif ($b > $a) {
        echo "Číslo B ($b) je větší než číslo A ($a).";
    } else {
        echo "Čísla A ($a) a B ($b) se rovnají.";
    }
    ?>
    
</body>
</html>