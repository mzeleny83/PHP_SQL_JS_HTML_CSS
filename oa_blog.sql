CREATE DATABASE IF NOT EXISTS oa__blog CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci;
USE oa__blog;

CREATE TABLE IF NOT EXISTS uzivatele (
  id INT AUTO_INCREMENT PRIMARY KEY,
  jmeno VARCHAR(90) NOT NULL
);

CREATE TABLE IF NOT EXISTS obrazky (
  id INT AUTO_INCREMENT PRIMARY KEY,
  url VARCHAR(255) NOT NULL,
  popis VARCHAR(120) NOT NULL
);

CREATE TABLE IF NOT EXISTS prispevky (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image INT NOT NULL,
  nadpis VARCHAR(90) NOT NULL,
  popis TEXT NOT NULL,
  datum DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_prispevky_image FOREIGN KEY (image) REFERENCES obrazky(id)
);

INSERT INTO uzivatele (jmeno) VALUES
('Karel'), ('Lucie'), ('Adam'), ('Barbora');

INSERT INTO obrazky (url, popis) VALUES
('http://localhost/20.11.2025/obrazky/hora.jpg','Výhled z horského sedla'),
('http://localhost/20.11.2025/obrazky/kra.jpg','Severní pobřeží'),
('http://localhost/20.11.2025/obrazky/poust.jpg','Písky a duny'),
('http://localhost/20.11.2025/obrazky/reka.jpg','Řeka v údolí');

INSERT INTO prispevky (image, nadpis, popis) VALUES
(1,'Výšlap do hor','Strmá cesta ke štítu, ledovec pod námi a čerstvý vzduch.'),
(2,'Pobřežní vítr','Sůl ve vlasech, útesy nad námi a dlouhá stezka kolem moře.'),
(4,'Podél řeky','Ranní mlha nad vodou, mosty a malé vesnice po cestě.');
