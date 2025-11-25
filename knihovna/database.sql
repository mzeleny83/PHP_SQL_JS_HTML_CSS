-- vytvořit databázi a použít ji
CREATE DATABASE IF NOT EXISTS oa_lekce
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;
USE oa_lekce;

-- autoři
CREATE TABLE IF NOT EXISTS spisovatele (
  Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  Jmeno VARCHAR(100) NOT NULL,
  Prijmeni VARCHAR(100) NOT NULL,
  PRIMARY KEY (Id),
  KEY idx_prijmeni (Prijmeni)
) ENGINE=InnoDB;

-- knihy
CREATE TABLE IF NOT EXISTS knihy (
  Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  Nazev VARCHAR(255) NOT NULL,
  Spisovatel INT UNSIGNED NOT NULL,
  Cena INT UNSIGNED NOT NULL DEFAULT 0,
  Popis TEXT NULL,
  PRIMARY KEY (Id),
  KEY idx_nazev (Nazev),
  CONSTRAINT fk_knihy_spisovatel
    FOREIGN KEY (Spisovatel) REFERENCES spisovatele(Id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ukázková data (volitelné)
INSERT INTO spisovatele (Jmeno, Prijmeni) VALUES
  ('Karel', 'Čapek'),
  ('Božena', 'Němcová'),
  ('Jaroslav', 'Seifert');

INSERT INTO knihy (Nazev, Spisovatel, Cena, Popis) VALUES
  ('R.U.R.', 1, 250, 'Drama s motivem robotů'),
  ('Babička', 2, 199, 'Klasika české literatury'),
  ('Maminka', 3, 180, 'Sbírka básní');
