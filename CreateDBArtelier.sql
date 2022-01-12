create database artelier;
use artelier;

CREATE TABLE Artista(
    cognome varchar(50) PRIMARY KEY,
    nome varchar(50),
    immagine varchar(500),
    descrizione varchar(500)
);

CREATE TABLE Utente(
    email varchar(50) PRIMARY KEY,
    passwordd varchar(250),
    nome varchar(50),
    cognome varchar(50),
    venditore boolean,
    indirizzo varchar(150),
	citta VARCHAR(50),
    paese varchar(50),
    cap int
);

CREATE TABLE CorrenteArtistica(
    nomeCorrArt varchar(20) PRIMARY KEY,
    immagine varchar(500),
    descrizione varchar(1000)
);

CREATE TABLE Quadro(
    titolo varchar(50) PRIMARY KEY,
    immagine varchar(500),
    dimensione varchar(20),
    artista varchar(50),
    nomeCorrArt varchar(50),
    prezzo float(7,2),
    descrizione varchar(500),
    FOREIGN KEY(artista) REFERENCES Artista(cognome),
    FOREIGN KEY(nomeCorrArt) REFERENCES CorrenteArtistica(nomeCorrArt)
);

CREATE TABLE Ordine(
    codOrdine int PRIMARY KEY AUTO_INCREMENT,
	email varchar(50),
    dataOrdine datetime,
    dataConsegna datetime,
	arrivato boolean,
    importo float(7,2),
    FOREIGN KEY(email) REFERENCES Utente(email)
);

CREATE TABLE Quadro_Ordinato(
    codQuadroOrdinato int  PRIMARY KEY  AUTO_INCREMENT,
	codOrdine int,
    titoloQuaOrd varchar(50),
    quantita int,
    FOREIGN KEY(codOrdine) REFERENCES Ordine(codOrdine),
    FOREIGN KEY(titoloQuaOrd) REFERENCES Quadro(titolo)
);

CREATE TABLE Carrello(
	codCarrello int  PRIMARY KEY  AUTO_INCREMENT,
    email varchar(50), 
	titolo varchar(50),
    quantita int,
    FOREIGN KEY(email) REFERENCES Utente(email),
	FOREIGN KEY(titolo) REFERENCES Quadro(titolo)
);

CREATE TABLE Notifica(
    codNotifica int PRIMARY KEY AUTO_INCREMENT,
    titolo varchar(40),
    testo varchar(500),
    dataeora datetime,
    visualizzato boolean,
    email varchar(50),
    FOREIGN KEY (email) REFERENCES Utente(email)
);