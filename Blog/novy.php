<?php

require "./conn.php";

if(isset($_POST["image"]) && isset($_POST["nadpis"])&& isset($_POST["popis"])) {
    $create_sql = "INSERT INTO prispevky (image, nadpis, popis) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $create_sql);
    $stmt->bind_param("iss", $_POST["image"], $_POST["nadpis"], $_POST["popis"]);
    $result = $stmt->execute();

    if (!$result) {
        die("SQL insert failed: " . $stmt->error);
    }

    header("Location: ./");
    exit;
}

// vzber vsech obrazku

$sql = "SELECT * FROM obrazky";
$stmt = mysqli_prepare($conn, $sql);
$result = $stmt->execute();
$result = $stmt->get_result();
$obrazky = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="padding: 0; margin: 0; font-family: Arial, Helvetica, sans-serif;">



<?php
    require("./komponenty/hlavicka.php");
?>

<main style="min-height: 60vh;">
<h1 style="text-align: center;">Přidání příspěvku</h1>
<form action="" method="POST" style="display: flex; flex-direction: column; width: 250px; margin: 0 auto;">
    <label for="image">Náhledový obrázek</label>
    <select name="image" placeholder="Obrázek" id="image">
        <option value="" selected disabled>Vyberte obrázek</option>
        <?php foreach($obrazky as $obrazek): ?>
            <option value="<?php echo $obrazek["id"]; ?>"><?php echo $obrazek["popis"]; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="nadpis">Nadpis</label>
    <input id="nadpis" name="nadpis" type="text">
    <label for="popis">Popis</label>
    <textarea rows="20" id="popis" name="popis" type="text"></textarea>
    <button>Vytvořit</button>
</form>
</main>

<?php
    require("./komponenty/paticka.php");
?>
</body>
</html>
