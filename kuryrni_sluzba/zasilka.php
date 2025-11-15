<?php
    include( "hlavicka.php" );
?>

<div>
    <h1>Sledování zásilky č. <?php echo $_GET[ 'id' ] ?></h1>
    
    
    <h3>Zásilka je ve stavu: </h3><h2>
    <?php
        $sql = "SELECT z.Id AS Id,
                z.Hmotnost AS Hmotnost,
                z.Dobirka AS Dobirka,
                od.Prijmeni AS OdesilatelPrijmeni,
                od.Jmeno AS OdesilatelJmeno,
                pr.Prijmeni AS PrijemcePrijmeni,
                pr.Jmeno AS PrijemceJmeno,
                a.Adresa AS AdresaPodani
                FROM zasilka AS z
                JOIN kontakty AS od ON od.Id = z.Odesilatel
                JOIN kontakty AS pr ON pr.Id = z.Prijemce
                JOIN adresy_mista AS a ON a.Id = z.Podaci_misto
                WHERE z.Id = " . $_GET[ 'id' ] . "
                GROUP BY z.Id";
        $zasilka = fetchAssoc( $sql, $conn );
        $sql = 'SELECT u.Typ AS Typ,
                u.Datum_zahajeni AS Datum,
                u.Z_adresy AS Z,
                u.Do_adresy AS Do,
                u.Stav AS Stav
                FROM zasilka_ukony AS zu
                JOIN ukony AS u ON u.Id = zu.Ukon_id
                WHERE zu.Zas_id = ' . $_GET[ 'id' ] . '
                AND ( u.Stav = "aktivni" OR u.Stav = "hotovy" ) 
                GROUP BY u.Id
                ORDER BY u.Datum_zahajeni ASC, u.Id ASC';
        $ukony = fetchAll( $sql, $conn );
        if( !empty( $zasilka )){
            
            //výpis aktivního stavu doručení
            $dorucen = false;
            $dorucujeSe = false;
            foreach( $ukony as $u ){
                if( $u[ 'Typ' ] == 'dorucen' ){
                    $dorucen = true;
                }
                if( $u[ 'Typ' ] == 'dorucovani' ){
                    $dorucujeSe = true;
                }
            }
            
            if( $dorucen ){
                echo "Doručena příjemci";
            }
            elseif( $dorucujeSe ){
                echo 'Doručuje se'; 
            }
            else{
                echo 'Zásilka převzata od odesílatele';
            }
            //výčet již proběhlých (či probíhajících) úkonů
            echo "</h2><br><br><h3>Seznam provedených úkonů</h3>
                <table>
                <tr><th>Úkon</th><th>Datum</th><th>Stav</th><th>Z adresy</th><th>Do adresy</th></tr>";
            foreach( $ukony as $u ){
                echo "<tr><td>" . $u[ "Typ" ] . 
                    "</td><td>" . $u[ "Datum" ] . 
                    "</td><td>" . $u[ "Stav" ] . 
                    "</td><td>" . $u[ "Z" ] . 
                    "</td><td>" . $u[ "Do" ] . 
                    "</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "Zásilka nenalezena, zkontrolujte zadané číslo.";
        }
    ?>
    </b>
</div>

<?php
    include( "paticka.php" );
?>