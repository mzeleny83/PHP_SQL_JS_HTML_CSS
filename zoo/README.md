# Projekt Zoo - Zoologická zahrada

## Instalace a spuštění

1. **Databáze**: Importujte soubor `database.sql` do MySQL databáze
2. **Konfigurace**: Zkontrolujte nastavení databáze v souboru `conn.php`
3. **Webserver**: Spusťte projekt na lokálním serveru (XAMPP, WAMP, atd.)
4. **Složka uploads**: Ujistěte se, že složka `uploads/` má práva pro zápis

## Struktura projektu

### Hlavní stránky:
- `index.php` - Úvodní stránka
- `poddruhtabulka.php` - Seznam poddruhů zvířat
- `jedinectabulka.php` - Seznam jedinců daného poddruhu
- `zamestnancitabulka.php` - Seznam zaměstnanců

### Formuláře pro správu jedinců:
- `jedinecinsertform.php` - Formulář pro vložení nového jedince
- `jedinecupdateform.php` - Formulář pro editaci jedince
- `jedinecdeleteform.php` - Formulář pro smazání jedince

### Zpracování formulářů:
- `jedinecinsert.php` - Zpracování vložení nového jedince
- `jedinecupdate.php` - Zpracování editace jedince
- `jedinecdelete.php` - Zpracování smazání jedince

### Pomocné soubory:
- `conn.php` - Připojení k databázi a pomocné funkce
- `hlavicka.php` - HTML hlavička a navigace
- `paticka.php` - HTML patička
- `css/style.css` - Styly

## Funkce

✅ **Dokončené funkce:**
1. Vytvoření tabulek podle schématu
2. Relace mezi tabulkami
3. Testovací data
4. Základní stránky (CSS, hlavička, patička, index)
5. Menu s odkazy na seznamy
6. Seznam poddruhů
7. Tabulka jedinců s odkazy na operace
8. Formulář pro smazání s tlačítkem "Zpět"
9. MySQL volání pro smazání
10. Formulář pro editaci s tlačítkem "Zpět"
11. MySQL volání pro editaci
12. Formulář pro vložení s tlačítkem "Zpět"
13. MySQL volání pro vložení
14. Rozšíření o sloupec "obrazek" pro ukládání obrázků
15. Zobrazení a nahrávání obrázků v edit formuláři

## Databázové schéma

### Tabulka `zamestnanci`
- `Id` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `Jmeno` (VARCHAR(50))
- `Prijmeni` (VARCHAR(50))
- `Pozice` (VARCHAR(100))

### Tabulka `poddruh`
- `Id` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `Oznaceni` (VARCHAR(100))
- `Popis` (TEXT)

### Tabulka `jedinec`
- `Id` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `Popis` (TEXT)
- `Pohlavi` (ENUM('m', 'f'))
- `Pecovatel` (INT, FOREIGN KEY -> zamestnanci.Id)
- `Poddruh` (INT, FOREIGN KEY -> poddruh.Id)
- `Obrazek` (VARCHAR(255))

## Použití

1. Na úvodní stránce klikněte na "Seznam poddruhů"
2. Vyberte poddruh pro zobrazení seznamu jedinců
3. V seznamu jedinců můžete:
   - Přidat nového jedince tlačítkem "Vložit nový"
   - Upravit existujícího jedince tlačítkem "Upravit"
   - Smazat jedince tlačítkem "Smazat"
4. Všechny formuláře mají tlačítko "Zpět" pro návrat na seznam
5. Při editaci a vkládání můžete nahrát obrázek jedince

## Podporované formáty obrázků
- JPG/JPEG
- PNG
- GIF

Obrázky se ukládají do složky `uploads/` s unikátním názvem.