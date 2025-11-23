
<?php
    include_once "header.php";
?>


<h1>Výdejky</h1>

<div>
    <table>
        <tr>
            <th>Název</th>
            <th>Množství</th>
        </tr>

        <?php
            $sql = " SELECT vydej.`id`, vydej.`mnozstvi`, kvetiny.nazev
            FROM `vydej`
            LEFT JOIN kvetiny ON kvetiny.id = vydej.idkvetiny
            ORDER BY kvetiny.nazev ";

            $results = fetchAll($conn, $sql);

            foreach ($results as $item){
                echo "<tr>";
                echo "    <td>".htmlspecialchars($item["nazev"])."</td>";
                echo "    <td>".htmlspecialchars($item["mnozstvi"])."</td>";
                echo "</tr>";
            }
        ?>

    </table>
</div>

<?php
    include_once "footer.php";
?>