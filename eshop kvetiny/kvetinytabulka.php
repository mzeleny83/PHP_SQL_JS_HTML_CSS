
<?php
    include_once "header.php";
?>


<h1>Květiny</h1>

<div>
    <table>
        <tr>
            <th>Název</th>
            <th>Cena</th>
            <th>Množství</th>
        </tr>

        <?php
            $sql = " SELECT * FROM kvetiny WHERE aktivni=1 ";

            $results = fetchAll($conn, $sql);

            foreach ($results as $item){
                echo "<tr>";
                echo "    <td>".htmlspecialchars($item["nazev"])."</td>";
                echo "    <td>".htmlspecialchars($item["cena"])."</td>";
                echo "    <td>".htmlspecialchars($item["mnozstvi"])."</td>";
                echo "</tr>";
            }
        ?>

    </table>
</div>
<a href="kvetinyinsertform.php">Vložit novou květinu</a>

<?php
    include_once "footer.php";
?>