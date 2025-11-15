<?php
    include( "hlavicka.php" );
?>

<div>
    <h1>Sledování zásilky</h1>
    
    
    <h3>Zadejte identifikační číslo zásilky: </h3>

    <form action="" method="POST">
        <input type="text" name="CisloZasilky" size="30"> <br> 
        <input type="submit" name="Odeslat" value="Vyhledat"><br>
    </form>
    <?php
        if( isset( $_POST[ 'Odeslat' ] ) && $_POST[ 'CisloZasilky' ] > '' ){
            $sql = "SELECT z.Id AS Id
                    FROM zasilka AS z
                    WHERE Id = " . $_POST[ 'CisloZasilky' ];
            $zasilka = fetchAssoc( $sql, $conn );
            if( !empty( $zasilka )){
                header( "Location: ./zasilka2.php?id=" . $_POST[ 'CisloZasilky' ] );
            }
            else{
                echo "Zásilka nenalezena, zkuste zkontrolovat zadané číslo.";
            }
        } 
    ?>
    
</div>

<?php
    include( "paticka.php" );
?>