<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $zvire = "kocka";

        // if ($zvire == "pes"){
        //     echo "Zvire je pes";
        // } else if($zvire == "kocka"){
        //     echo "Zvire je kocka";
        // } else {
        //     echo "Toto zvire neznam";
        // }

        switch ($zvire) {
            case "pes":
                echo "Zvire je pes";
                break;
            case "kocka":
                echo "Zvire je kocka";
                break;
            default:
                echo "Toto zvire neznam";
                break;
        }
        
    ?>
</body>
</html>