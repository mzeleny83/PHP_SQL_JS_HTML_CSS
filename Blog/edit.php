<?php

require "./conn.php";

if (!isset($_GET["id"])) {
    header("Location: ./");
    die();
}

if(isset($_POST["delete"]) && $_POST["delete"] == "true") {
    $delete_sql = "DELETE FROM prispevky WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_sql);
    $stmt->bind_param("i", $_GET["id"]);
    $result = $stmt->execute();
    header("Location: ./");
    die();
}

// vyber obrazku
$sql = "SELECT 
pr.id,
pr.nadpis,
pr.popis,
pr.datum,
pr.image,
obr.url as image_url
FROM prispevky AS pr 
JOIN obrazky AS obr ON pr.image = obr.id 
WHERE pr.id = ?
";

$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param("i", $_GET["id"]);
$result = $stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    header("Location: http://localhost/20.11.2025/");
    die();
}

if (isset($_POST["image"]) && isset($_POST["nadpis"]) && isset($_POST["popis"])) {
    $update_sql = "UPDATE prispevky SET image = ?, nadpis = ?, popis = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    $stmt->bind_param("issi", $_POST["image"], $_POST["nadpis"], $_POST["popis"], $_GET["id"]);
    $result = $stmt->execute();

    if (!$result) {
        die("SQL update failed: " . $stmt->error);
    }

    // navraceni na detail upraveneho prispevku
    header("Location: ./prispevek.php?id=" . $_GET["id"]);
    exit;
}

// vyber vsech obrazku

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

    <script>
        function confirmDelete(e) {
            e.preventDefault(); // zabrání odeslání formuláře po kliknutí na tlačítko
            // confirm(text) funkce vyvolá dialog s textem a vrací true nebo false
            if(confirm("Opravdu chcete smazat tento příspěvek?")) {
                document.getElementById("js-delete-form").submit(); // odešle formulář až po potvrzení
            }
        }
    </script>
</head>

<body style="padding: 0; margin: 0; font-family: Arial, Helvetica, sans-serif;">



    <?php
        require("./komponenty/hlavicka.php");
    ?>

    <main style="min-height: 60vh;">
        <h1 style="text-align: center;">Přidání příspěvku</h1>
        <form action="" method="POST" style="display: flex; flex-direction: column; width: 250px; margin: 0 auto;">
            <label for="image">Náhledový obrázek</label>
            <select name="image" placeholder="Obrázek" id="image" selected="<?php echo $post["image"]; ?>">
                <option value="" disabled>Vyberte obrázek</option>
                <?php foreach ($obrazky as $obrazek): ?>
                    <option 
                        value="<?php echo $obrazek["id"]; ?>" 
                        <?php echo $obrazek["id"] == $post["image"] ? "selected" : ""; ?>
                    >
                        <?php echo $obrazek["popis"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="nadpis" value="<?php echo $post["nadpis"]; ?>">Nadpis</label>
            <input id="nadpis" name="nadpis" type="text" value="<?php echo $post["nadpis"]; ?>">
            <label for="popis">Popis</label>
            <textarea rows="20" id="popis" name="popis" type="text"><?php echo $post["popis"]; ?></textarea>
            <button>Uložit</button>
        </form>
        <br>
        <form onsubmit="confirmDelete(event)" id="js-delete-form" action="" method="POST">
            <input hidden type="text" name="delete" value="true">
            <button>Smazat</button>
        </form>
    </main>

    <?php
        require("./komponenty/paticka.php");
    ?>
</body>

</html>
