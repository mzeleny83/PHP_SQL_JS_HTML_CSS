<?php include( "hlavicka.php" ); ?>

<?php

    if(!isset($_GET["id"])){
        echo "Je vyzadovano cislo zasilky!";
        die();
    }

    $sql = "SELECT z.Id AS Id,

    z.Hmotnost AS Hmotnost,
    z.Dobirka AS Dobirka,

    od.Jmeno AS OdJmeno,
    od.Prijmeni AS OdPrijmeni,
    od.Telefon AS OdTelefon,
    od.Email AS OdEmail,
    
    pro.Jmeno AS ProJmeno,
    pro.Prijmeni AS ProPrijmeni,
    pro.Telefon AS ProTelefon,
    pro.Email AS ProEmail

    FROM zasilka AS z
    JOIN kontakty od ON od.Id = z.Odesilatel
    JOIN kontakty pro ON pro.Id = z.Prijemce
    JOIN adresy_mista AS a ON a.Id = z.Podaci_misto
    
    WHERE z.Id = ". $_GET["id"] ."
    GROUP BY z.Id
    ";

    $z = fetchAssoc($sql, $conn);

    $sql_ukony = "SELECT u.Typ as Typ,
    u.Datum_zahajeni as Datum,
    CONCAT('(', z.Typ, ') ', z.Adresa) as Z,
    do.Typ AS DoTyp,
    do.Adresa AS DoAdresa,
    u.Stav as Stav

    FROM zasilka_ukony AS zu
    JOIN ukony AS u ON u.Id = zu.Ukon_id
    JOIN adresy_mista AS z ON z.Id = u.Z_adresy
    JOIN adresy_mista AS do ON do.Id = u.Do_adresy
    WHERE zu.Zas_id = ". $_GET["id"] ."
    AND (u.Stav = 'aktivni' OR u.Stav = 'hotovy')
    GROUP BY u.Id
    ";

    $ukony = fetchAll($sql_ukony, $conn);
?>
    <style>
        * {
            font-family: Arial;
        }
        .info {
            display: grid;
            grid-template-columns: 200px 200px;
        }
    </style>
    <h1>Detail zásilky č. <?php echo $_GET[ 'id' ] ?></h1>
    <div>
        <h2>Detail objednavky</h2>
        <p>
            Hmotnost: <?php echo $z["Hmotnost"] ?>
        </p>
        <p>
            Dobirka: <?php echo $z["Dobirka"] ?> Kč
        </p>
    </div>
    <div class="info">
        <div>
            <h2>Od</h2>
            <h3>
                <?php echo $z["OdJmeno"]." ".$z["OdPrijmeni"] ?>
            </h3>
            <p>
                <a href="mailto:<?php echo $z["OdEmail"] ?>">
                    <?php echo $z["OdEmail"] ?>
                </a>
                <br/>
                <a href="tel:<?php echo $z["OdTelefon"] ?>">
                    tel: <?php echo $z["OdTelefon"] ?>
                </a>
            </p>
        </div>
        <div>
            <h2>Pro</h2>
            <h3>
                <?php echo $z["ProJmeno"]." ".$z["ProPrijmeni"] ?>
            </h3>
            <p>
                <a href="mailto:<?php echo $z["ProEmail"] ?>">
                    <?php echo $z["ProEmail"] ?>
                </a>
                <br/>
                <a href="tel:<?php echo $z["ProTelefon"] ?>">
                    tel: <?php echo $z["ProTelefon"] ?>
                </a>
            </p>
        </div>
    </div>
    <h2>Stav zásilky</h2>
    <?php if(empty($ukony)): ?>
        <p>Cekame na dodani zasilky</p>
    <?php else: ?>
        <table style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>Typ</th>
                    <th>Datum</th>
                    <th>Stav</th>
                    <th>Z</th>
                    <th>Do</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ukony as $ukon): ?>
                    <tr>
                        <td>
                            <?php echo $ukon["Typ"] ?>
                        </td>
                        <td>
                            <?php echo $ukon["Datum"] ?>
                        </td>
                        <td>
                            <?php echo $ukon["Stav"] ?>
                        </td>
                        <td>
                            <?php echo $ukon["Z"] ?>
                        </td>
                        <td>
                            <?php echo "(".$ukon["DoTyp"].") ".$ukon["DoAdresa"] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif ?>
<?php include( "paticka.php" ); ?>
