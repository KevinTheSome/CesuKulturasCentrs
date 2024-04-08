CREATE database cesukulturasnams;

CREATE TABLE kolektivi(
    id SERIAL NOT NULL,
    name varchar(80) NOT NULL,
    description varchar(500) NOT NULL,
    PRIMARY KEY (id)
)

--test data
INSERT INTO kolektivi (name,description) VALUES('Cēsis','Pūtēju orķestris'),('Raitais solis','Tautu deju ansamblis'),('Vidzeme','Jauktais koris'),('Dzieti','Tautas vērtes kopa');

SELECT * FROM kolektivi
