<?php
require "./conn.php";

// vezmi všechny příspěvky s náhledem
$sql = "SELECT pr.id, pr.nadpis, pr.popis, pr.datum, obr.url AS image_url
        FROM prispevky AS pr
        JOIN obrazky AS obr ON pr.image = obr.id
        ORDER BY pr.datum DESC";
$stmt = mysqli_prepare($conn, $sql);
$stmt->execute();
$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">
<?php require("./komponenty/hlavicka.php"); ?>

<main style="min-height:60vh; max-width:900px; margin:40px auto; padding:0 20px;">
    <h1>Všechny příspěvky</h1>
    <?php if (empty($posts)): ?>
        <p>Žádné příspěvky zatím nejsou.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <article style="display:flex; gap:16px; margin:24px 0; align-items:flex-start;">
                <img src="<?php echo $post['image_url']; ?>" alt="" style="width:160px; height:110px; object-fit:cover; flex-shrink:0;">
                <div>
                    <a href="prispevek.php?id=<?php echo $post['id']; ?>" style="color:#000; text-decoration:none;">
                        <h2 style="margin:0;"><?php echo $post['nadpis']; ?></h2>
                    </a>
                    <p style="margin:6px 0; color:#666;"><?php echo $post['datum']; ?></p>
                    <p style="margin:0;"><?php echo substr($post['popis'], 0, 20); ?>...</p>
                    <div style="margin-top:8px;">
                        <a href="edit.php?id=<?php echo $post['id']; ?>">Upravit</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="novy.php">+ Přidat nový příspěvek</a></p>
</main>

<?php require("./komponenty/paticka.php"); ?>
</body>
</html>
