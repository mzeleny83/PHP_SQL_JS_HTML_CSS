<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formulář</title>
</head>
<body>
    <h1>Formulář s PHP</h1>
    
    <form action="" method="POST">
        <label for="jmeno">Jméno:</label>
        <input type="text" id="jmeno" name="jmeno" required><br><br>
        
        <label for="prijmeni">Příjmení:</label>
        <input type="text" id="prijmeni" name="prijmeni" required><br><br>
        
        <label for="pohlavi">Pohlaví:</label>
        <select id="pohlavi" name="pohlavi">
            <option value="muz">Muž</option>
            <option value="zena">Žena</option>
        </select><br><br>
        
        <input type="submit" value="Odeslat">
    </form>
    
    <hr>
    
    <?php
    if ($_POST) {
        echo "<h2>Odeslané údaje (POST):</h2>";
        echo "Jméno: " . $_POST['jmeno'] . "<br>";
        echo "Příjmení: " . $_POST['prijmeni'] . "<br>";
        echo "Pohlaví: " . $_POST['pohlavi'] . "<br>";
    } else {
        echo "<p>Formulář nebyl odeslán. Je třeba ho odeslat.</p>";
    }
    ?>
    
    <hr>
    
    <h2>Test s metodou GET:</h2>
    <form action="" method="GET">
        <label for="jmeno2">Jméno:</label>
        <input type="text" id="jmeno2" name="jmeno" required><br><br>
        
        <label for="prijmeni2">Příjmení:</label>
        <input type="text" id="prijmeni2" name="prijmeni" required><br><br>
        
        <label for="pohlavi2">Pohlaví:</label>
        <select id="pohlavi2" name="pohlavi">
            <option value="muz">Muž</option>
            <option value="zena">Žena</option>
        </select><br><br>
        
        <input type="submit" value="Odeslat (GET)">
    </form>
    
    <?php
    if ($_GET) {
        echo "<h2>Odeslané údaje (GET):</h2>";
        echo "Jméno: " . $_GET['jmeno'] . "<br>";
        echo "Příjmení: " . $_GET['prijmeni'] . "<br>";
        echo "Pohlaví: " . $_GET['pohlavi'] . "<br>";
    }
    ?>
    
</body>
</html>