<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formuláře</title>
</head>
<body>
    <form action="" method="post">
        <label>Jmeno: </label>
        <input type="text" name="jmeno" placeholder="Jméno" /><br/>
        <label>Cislo: </label>
        <input type="number" name="vek" placeholder="Vek"><br/>
        <input type="password" name="heslo" placeholder="Heslo"> <br/>
        <input type="email" placeholder="Email" name="email"> <br/>
        <input type="submit" value="Odeslat"/>
    </form>
    <h3>Odeslana data na server:</h3>
    <?php
        echo "<p>POST data: ";
        print_r($_POST);
        echo "</p>";
        
        if($_POST) {
            echo "<h4>Odesláno:</h4>";
            echo "Jméno: " . $_POST["jmeno"] . "<br>";
            echo "Věk: " . $_POST["vek"] . "<br>";
            echo "Heslo: " . $_POST["heslo"] . "<br>";
            echo "Email: " . $_POST["email"] . "<br>";
        } else {
            echo "<p>Formulář nebyl odeslán</p>";
        }
    ?>
</body>
</html>