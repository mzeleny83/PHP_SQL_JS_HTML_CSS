<?php

require "./conn.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;
if (!$id) {
    header("Location: ./");
    exit;
}

if (isset($_POST["delete"]) && $_POST["delete"] === "true") {
    $delete_sql = "DELETE FROM prispevky WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ./");
    exit;
}

// načtení dat příspěvku pro formulář
$sql = "SELECT 
    pr.id,
    pr.nadpis,
    pr.popis,
    pr.datum,
    pr.image,
    obr.url AS image_url
    FROM prispevky AS pr 
    JOIN obrazky AS obr ON pr.image = obr.id 
    WHERE pr.id = ?";
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    header("Location: ./");
    exit;
}

// update příspěvku
if (isset($_POST["image"]) && isset($_POST["nadpis"]) && isset($_POST["popis"])) {
    $update_sql = "UPDATE prispevky SET image = ?, nadpis = ?, popis = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    $stmt->bind_param("issi", $_POST["image"], $_POST["nadpis"], $_POST["popis"], $id);
    $result = $stmt->execute();

    if (!$result) {
        die("SQL update failed: " . $stmt->error);
    }

    header("Location: ./prispevek.php?id=" . $id);
    exit;
}

// výběr všech obrázků
$sql = "SELECT * FROM obrazky";
$stmt = mysqli_prepare($conn, $sql);
$stmt->execute();
$result = $stmt->get_result();
$obrazky = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit příspěvek</title>
</head>
<body style="padding: 0; margin: 0; font-family: Arial, Helvetica, sans-serif;">

<?php require("./komponenty/hlavicka.php"); ?>

<main style="min-height: 60vh;">
    <h1 style="text-align: center;">Upravit příspěvek</h1>
    <form action="" method="POST" style="display: flex; flex-direction: column; width: 250px; margin: 0 auto;">
        <label for="image">Náhledový obrázek</label>
        <select name="image" id="image">
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

        <label for="nadpis">Nadpis</label>
        <input id="nadpis" name="nadpis" type="text" value="<?php echo htmlspecialchars($post["nadpis"], ENT_QUOTES); ?>">

        <label for="popis">Popis</label>
        <textarea rows="20" id="popis" name="popis"><?php echo htmlspecialchars($post["popis"], ENT_QUOTES); ?></textarea>

        <div style="display:flex; gap:12px; margin-top:12px; align-items:center;">
            <button type="submit" style="padding:10px 14px; cursor:pointer;">Uložit</button>
            <button
                type="submit"
                name="delete"
                value="true"
                style="padding:10px 14px; background:#c62828; color:#fff; border:none; cursor:pointer; min-width:120px;"
                onclick="return confirm('Opravdu chcete smazat tento příspěvek?');"
            >
                Smazat
            </button>
        </div>
    </form>
</main>

<?php require("./komponenty/paticka.php"); ?>
</body>
</html>

