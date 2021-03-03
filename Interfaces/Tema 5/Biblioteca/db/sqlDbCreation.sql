CREATE TABLE Books (
    isbn varchar(255) NOT NULL,
    autor varchar(255) NOT NULL,
    titulo varchar(255) NOT NULL,
    genero varchar(255) NOT NULL,
    rutaimg varchar(255) NOT NULL,
    ano int NOT NULL,
    puntuacion DECIMAL(3,2),
    PRIMARY KEY (isbn)
);

CREATE TABLE Multas (
    multaid INT NOT NULL AUTO_INCREMENT,
    isbn varchar(255) NOT NULL,
    fechainicio DATE NOT NULL, /*formato yyyy-mm-dd*/
    fechafinal DATE,
    PRIMARY KEY (multaid),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);


CREATE TABLE Users (
    mail varchar(255) NOT NULL,
    nombre varchar(255) NOT NULL,
    multaId INT,
    contraseña varchar(255) NOT NULL,
    administrator boolean NOT NULL,
    PRIMARY KEY (mail),
    FOREIGN KEY (multaid) REFERENCES Multas(multaid)
);

CREATE TABLE Comentarios (
    idcomentario int NOT NULL AUTO_INCREMENT,
    isbn varchar(255) NOT NULL,
    comentario varchar(255),
    puntuacion DECIMAL(3,2),
    mail varchar(255),
    PRIMARY KEY (idcomentario),
    FOREIGN KEY (mail) REFERENCES Users(mail),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);

CREATE TABLE Alquiler (
    idalquiler INT NOT NULL AUTO_INCREMENT,
    mail varchar(255) NOT NULL,
    isbn varchar(255) NOT NULL,
    fechainicio DATE NOT NULL,
    fechafinal DATE NOT NULL,
    PRIMARY KEY (idalquiler),
    FOREIGN KEY (mail) REFERENCES Users(mail),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);




/*INSERTS BOOKS*/

INSERT INTO `Books` (`isbn`, `autor`, `titulo`, `genero`, `rutaimg`, `ano`, `puntuacion`) VALUES ('978-84-666-5766-2', 'BRANDON SANDERSON', 'EL CAMINO DE LOS REYES', 'FANTASIA', 'caminodelosreyes.png', '2012', '5');


/*INSERTS USERS*/

INSERT INTO `Users` (`mail`, `nombre`, `multaId`, `contraseña`, `administrator`) VALUES ('miguel00rg@hotmail.com', 'TEKER', NULL, 'TEKER', '1');


/*INSERTS ALQUILER*/

INSERT INTO `Alquiler` (`idalquiler`, `mail`, `isbn`, `fechainicio`, `fechafinal`) VALUES (NULL, 'miguel00rg@hotmail.com', '978-84-666-5766-2', '2021-03-03', '2021-03-17');

/*INSERTS COMENTARIOS*/

INSERT INTO `Comentarios` (`idcomentario`, `isbn`, `comentario`, `puntuacion`, `mail`) VALUES (NULL, '978-84-666-5766-2', 'me ha gustao un monton ta chulo el libro nene', '4.2', 'miguel00rg@hotmail.com');

/*INSERTS MULTAS*/

INSERT INTO `Multas` (`multaid`, `isbn`, `fechainicio`) VALUES (NULL, '978-84-666-5766-2', '2021-03-02');
