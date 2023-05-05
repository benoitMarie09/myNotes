CREATE DATABASE IF NOT EXISTS prise_note;
CREATE TABLE IF NOT EXISTS note
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) UNIQUE,
    descriptif TEXT,
    id_note INT,
    FOREIGN KEY ( id_note ) REFERENCES note( id )
)