<?php

require "./conn.php";

if (!isset($_GET["id"])) {
    header("Location: http://localhost/20.11.2025/");
    die();
}

$sql = "SELECT 
pr.id,
pr.nadpis,
pr.popis,
pr.datum,
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;">
    <?php
    require("./komponenty/hlavicka.php");
    ?>

    <main style="min-height: 60vh;">
        <div style="max-width: 500px; margin: 60px auto;">
            <img style="width: 500px;" src="<?php echo $post["image_url"]; ?>">
            <p><?php echo $post["datum"]; ?></p>
            <h1><?php echo $post["nadpis"]; ?></h1>
            <pre style="font-size: 20px; white-space: pre-wrap; font-family: Arial, Helvetica, sans-serif;"><?php echo $post["popis"]; ?></pre>
            <form action="edit.php?id=<?php echo $post["id"]; ?>" method="POST" onsubmit="return confirm('Opravdu chcete smazat tento příspěvek?');" style="margin-top:16px;">
                <input type="hidden" name="delete" value="true">
                <button>Smazat</button>
            </form>
        </div>
    </main>

    <?php
        require("./komponenty/paticka.php");
    ?>

</body>

</html>
