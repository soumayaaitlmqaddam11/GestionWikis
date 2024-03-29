CREATE DATABASE IF NOT EXISTS `soum`;
use 'soum'
CREATE TABLE Utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role ENUM('admin', 'auteur') NOT NULL
);
CREATE TABLE Categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE Tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE Wiki (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    contenu TEXT,
    archived BOOLEAN,
    id_utilisateur INT,
    id_categorie INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Details (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_wiki INT,
    id_tag INT,
    FOREIGN KEY (id_wiki) REFERENCES Wiki(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_tag) REFERENCES Tag(id) ON DELETE CASCADE ON UPDATE CASCADE
);
