# Zadání pro Blog stránky
### Předmluva
Několik kamarádů cestovatelů se rozhodlo, že si založí blog, kde budou dokumentovat jejich cesty. U každého blogového příspěvku budou chtít vědět, kdo se cesty zůčastnil a kdy byla uskutečněna. Dále bude mít každý příspěvěk náhledový obrázek, nadpis a viceřádkový popis.

## Návrh
### Tabulky
#### 1. Uživatelé
Tabulka `uzivatele` bude obsahovat kamarády cestovatele. Bude zapotřebí:
- id
- jmeno

#### 2. Obrázky
Tabulka `obrazky`, kde se budou uchovávat všechny nahrané obrázky. Pro zjednodušení nahrávání implementovat nebudeme a použijeme 4 předpřipravené obrázky ve složce `/obrazky`. Bude zapotřebí ukládat:
- id
- url
- popis

#### 3. Příspěvky
Tabulka `blog` bude obsahova tlogové příspěvky. Bude zapotřebí ukládat:
- `id` INT
- `image` (text) - bude obsahovat úplnou adresu k obrázku (např. http://localhost/obrazky/hora.jpg)
- `nadpis` varchar(90)
- `popis` text
- `datum` DATE - zde nastavte, aby výchozí hodnota byla datum vytvoření záznamu (t.j. CURRENT_TIMESTAMP)

### Komponenta Hlavička
Bude obsahovat link na domovskou stránku s textem např. Všechny příspěvky. Text bude bíle, pozadí černě (nebo vlastní barvou odlišnou od bílé).

### Komponenta Patička
Bude obsahovat bílý text na zarovnaný na černém pozadí (nebo použijte vlastní barvu odlišnou od bílé). Text bude zarovnaný na střed.
Jeho obsah bude:
```
Vítejte ve světě našich společných dobrodružství, kde se cesta stává cílem. Prostřednictvím našich článků a fotografií vás vezmeme s sebou na místa, která nás uchvátila, a ukážeme vám svět našima očima. Připojte se k naší výpravě a načerpejte inspiraci pro své vlastní toulky po planetě.
``` 

## Úkoly
#### 0. Úvod
Vytvořte všechny tabulky ze zadání a naplňte tabulku `uzivatele` třemi záznamy (různými). Dále naplňte tabulku obrázky čtyřmi obrázky, které jsou ve složce `/obrazky` tak, aby url obsahovala vždy úplnou adresu (např. http://localhost/obrazky/hora.jpg).

#### Úkol 1: Přidávání příspěvku
Vytvořte stránku pro přidávání příspěvku. Stránka bude obsahovat hlavičku i patičku. Uživatel bude schopen vytvořit příspěvek pomocí formuláře. Nadpis bude jednořádkový input, popis bude víceřádkový vstup (t.j. element `<textarea></textarea>`, ta musí obsahovat uzavírací tag a stejně jako input ji nastavte name na vámi zvolenou hodnotu).

#### Úkol 2: Seznam příspěvků (domovská stránka)
Vytvořte stránku pro zobrazení všech příspěvků. Stránka bude obsahovat hlavičku i patičku. Stránka bude mít GET parametr `post`, který bude obsahovat id příspěvku. Každý příspěvek bude mít obrázek (rozumné velikosti), nadpis a ukázku textu, který bude oříznutý na 20 znaků, to se dělá pomocí `substr(popis, 0, 20)`. Každý příspěvek povede po kliknutí na stránku daného příspěvku.

#### Úkol 3: Detail příspěvku
Stránka bude obsahovat obrázek příspěvku (rozumné celikosti, na střed). Pod ním bude datum vytvoření, nadpis a samotný popis (neboli obsaho příspěvku). Dále bude stránka obsahovat také komponenty hlavičku a patičku.

#### Úkol 4 (navíc): Úprava příspěvku
Stránka bude obsahovat kompoenty hlavičku i patičku. Hlavním cílem bude načíst data z příspěvku, dosadit je do shodného formuláře, jako je v Úkol 1 a odeslání formuláře daný příspěvek upraví. Dále lze také přidat tlačítko smazat příspěvek
