# tabeli loomine

CREATE TABLE akitt_loomaaed (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nimi VARCHAR(50),
    vanus INTEGER,
    liik VARCHAR(50),
    puur INTEGER
);

# tabeli täitmine

INSERT INTO akitt_loomaaed (nimi, vanus, liik, puur) VALUES

('Bruno', '3', 'Koer', '2'),
('Matu', '2', 'Kass', '2'),
('Tuuli', '5', 'Koer', '1'),
('Pluuto', '4', 'Hiir', '3'),
('Fredy','1', 'Koer', '4'),
('Miisu', '6', 'Elevant', '2');

# selekteerimine

SELECT nimi, puur FROM akitt_loomaaed WHERE puur = 2;

SELECT MIN(vanus) AS 'Noorim', MAX(vanus) AS 'Vanim' FROM akitt_loomaaed;

SELECT puur, COUNT(puur) AS 'Loomade arv' from akitt_loomaaed GROUP BY puur;

UPDATE akitt_loomaaed SET vanus=vanus+1;