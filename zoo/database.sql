-- Vytvoření databáze
CREATE DATABASE IF NOT EXISTS oa__zoologicka_zahrada;
USE oa__zoologicka_zahrada;

-- Tabulka zaměstnanců
CREATE TABLE IF NOT EXISTS zamestnanci (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Jmeno VARCHAR(50) NOT NULL,
    Prijmeni VARCHAR(50) NOT NULL,
    Pozice VARCHAR(100)
);

-- Tabulka poddruhů
CREATE TABLE IF NOT EXISTS poddruh (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Oznaceni VARCHAR(100) NOT NULL,
    Popis TEXT
);

-- Tabulka pavilonů
CREATE TABLE IF NOT EXISTS pavilon (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nazev VARCHAR(100) NOT NULL,
    Popis TEXT
);

-- Tabulka prostorů
CREATE TABLE IF NOT EXISTS prostor (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nazev VARCHAR(100) NOT NULL,
    Rozloha DECIMAL(10,2),
    Pavilon INT,
    FOREIGN KEY (Pavilon) REFERENCES pavilon(Id)
);

-- Tabulka stravy
CREATE TABLE IF NOT EXISTS strava (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nazev VARCHAR(100) NOT NULL,
    Typ VARCHAR(50),
    Popis TEXT
);

-- Tabulka jedinců
CREATE TABLE IF NOT EXISTS jedinec (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Popis TEXT,
    Pohlavi ENUM('m', 'f') NOT NULL,
    Pecovatel INT,
    Poddruh INT NOT NULL,
    Prostor INT,
    Obrazek VARCHAR(255),
    FOREIGN KEY (Pecovatel) REFERENCES zamestnanci(Id),
    FOREIGN KEY (Poddruh) REFERENCES poddruh(Id),
    FOREIGN KEY (Prostor) REFERENCES prostor(Id)
);

-- Vazební tabulka pro stravu jedinců
CREATE TABLE IF NOT EXISTS jedinec_strava (
    Jedinec_Id INT,
    Strava_Id INT,
    Mnozstvi DECIMAL(10,2),
    PRIMARY KEY (Jedinec_Id, Strava_Id),
    FOREIGN KEY (Jedinec_Id) REFERENCES jedinec(Id),
    FOREIGN KEY (Strava_Id) REFERENCES strava(Id)
);

-- Testovací data
INSERT INTO zamestnanci (Jmeno, Prijmeni, Pozice) VALUES
('Jan', 'Novák', 'Ošetřovatel'),
('Marie', 'Svobodová', 'Veterinář'),
('Petr', 'Dvořák', 'Ošetřovatel'),
('Anna', 'Procházková', 'Vedoucí');

INSERT INTO poddruh (Oznaceni, Popis) VALUES
('Lev africký', 'Velká kočkovitá šelma žijící v Africe'),
('Tygr sibiřský', 'Největší žijící kočkovitá šelma'),
('Slon africký', 'Největší suchozemský savec'),
('Žirafa síťovaná', 'Nejvyšší žijící savec');

INSERT INTO pavilon (Nazev, Popis) VALUES
('Africký pavilon', 'Pavilon pro africká zvířata'),
('Asijský pavilon', 'Pavilon pro asijská zvířata'),
('Savana', 'Venkovní výběh pro velká zvířata');

INSERT INTO prostor (Nazev, Rozloha, Pavilon) VALUES
('Výběh lvů', 500.00, 1),
('Výběh tygrů', 400.00, 2),
('Výběh slonů', 1000.00, 3),
('Výběh žiraf', 800.00, 3);

INSERT INTO strava (Nazev, Typ, Popis) VALUES
('Maso hovězí', 'Maso', 'Čerstvé hovězí maso'),
('Seno', 'Rostlinná', 'Kvalitní seno pro býložravce'),
('Ovoce mix', 'Rostlinná', 'Směs čerstvého ovoce'),
('Zelenina', 'Rostlinná', 'Čerstvá zelenina');

INSERT INTO jedinec (Popis, Pohlavi, Pecovatel, Poddruh, Prostor) VALUES
('Simba - mladý samec', 'm', 1, 1, 1),
('Nala - dospělá samice', 'f', 1, 1, 1),
('Boris - dospělý samec', 'm', 2, 2, 2),
('Jumbo - starší samec', 'm', 3, 3, 3),
('Gira - mladá samice', 'f', 4, 4, 4);

INSERT INTO jedinec_strava (Jedinec_Id, Strava_Id, Mnozstvi) VALUES
(1, 1, 5.0), (1, 3, 2.0),
(2, 1, 4.0), (2, 3, 2.0),
(3, 1, 6.0), (3, 3, 1.5),
(4, 2, 20.0), (4, 3, 10.0), (4, 4, 15.0),
(5, 2, 15.0), (5, 3, 8.0), (5, 4, 12.0);