CREATE TABLE Pagamento(
    codPagamento int PRIMARY KEY AUTO_INCREMENT,
    importo double
);

CREATE TABLE Artista(
    codArtista int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50),
    cognome varchar(50),
    dataNascita date
);

CREATE TABLE Utente(
    email varchar(50) PRIMARY KEY,
    passwordd varchar(50),
    nome varchar(50),
    cognome varchar(50)
);

CREATE TABLE CorrenteArtistica(
    nomeCorrArt varchar(20) PRIMARY KEY,
    descrizione varchar(200)
);

CREATE TABLE Carrello(
    codCarrello int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50), 
    FOREIGN KEY(email) REFERENCES Utente(email)
);

CREATE TABLE Ordine(
    codOrdine int PRIMARY KEY AUTO_INCREMENT,
    dataOrdine date,
    dataSpedizione date,
    dataConsegna dateTime,
    stato boolean,
    codCarrello int ,
    codPagamento int,
    FOREIGN KEY(codCarrello) REFERENCES Carrello (codCarrello),
    FOREIGN KEY(codPagamento) REFERENCES Pagamento(codPagamento)
);

CREATE TABLE Quadro(
    codQuadro int PRIMARY KEY AUTO_INCREMENT,
    titolo varchar(50),
    dimensione varchar(20),
    artista int,
    nomeCorrArt varchar(50),
    FOREIGN KEY(artista) REFERENCES Artista(codArtista),
    FOREIGN KEY(nomeCorrArt) REFERENCES CorrenteArtistica(nomeCorrArt)
);

CREATE TABLE Quadro_Ordinato(
    codQuadroOrdinato int PRIMARY KEY AUTO_INCREMENT,
    quantita int,
    codQuadro int,
    FOREIGN KEY(codQuadro) REFERENCES Quadro(codQuadro)
);

CREATE TABLE Compone(
    codCarrello int,
    codQuadro int,
    PRIMARY KEY (codCarrello, codQuadro),
    FOREIGN KEY(codCarrello) REFERENCES Carrello(codCarrello),
    FOREIGN KEY(codQuadro) REFERENCES Quadro(codQuadro)
);

CREATE TABLE Notifica(
    codNotifica int PRIMARY KEY AUTO_INCREMENT,
    titolo varchar(20),
    testo varchar(500),
    dataeora datetime,
    visualizzato boolean,
    email varchar(50),
    FOREIGN KEY (email) REFERENCES Utente(email)
);