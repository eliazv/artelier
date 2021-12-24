Insert into utente()
values ("elia@ciao.com", "ciao", "elia", "zavatta");

Insert into utente()
values ("pietro@ciao.com", "ciao", "pietro", "lelli");

Insert into utente()
values ("giovanni@ciao.com", "ciao", "giovanni", "maffi");

Insert into artista()
values ("Picasso", "Pablo", "picasso.jpg", 
"Nato il 25 ottobre 1881 è uno dei più grandi artisti mai esistiti, fondatore del cubismo. ");

Insert into artista()
values ("Dalì", "Salvador", "dali.jpg", 
"Lo spagnolo Salvador Dalí (Figueres, 1904-1989) è considerato uno dei più importanti artisti del XX secolo, ed uno degli esponenti di punta del Surrealismo.");

Insert into artista()
values ("Van Gogh", "Vincent", "vangogh.jpg", 
"Van gohh � molto bravo");

Insert into artista()
values ("Munch", "Edvard", "Munch.jpg", 
"Munch � molto bravo");

Insert into artista()
values ("Da Vinci", "Leonardo", "leodavinci.jpg", 
"Leo � molto bravo");




insert into CorrenteArtistica()
values ("Cubismo", "cubismo.jpg", "Cubismo è il termine col quale si è soliti rappresentare una corrente artistica e culturale ben riconoscibile, distinta e fondante rispetto a molte altre correnti e movimenti che si sarebbero successivamente sviluppate. Tuttavia il cubismo non è un movimento capeggiato da un fondatore e non ha una direzione unitaria.");

insert into CorrenteArtistica()
values ("Espressionismo", "espressionismo.jpg", "Espressionismo bella corrente");

insert into CorrenteArtistica()
values ("Futurismo", "futurismo.jpg", "Futurismo bella corrente");


Insert into quadro()
values ("Guernica","guernica.jpg", "200x100", "Picasso", "Cubismo", "299.99", "Il 26 aprile 1937, gli aerei tedeschi, in appoggio alle truppe del generale Franco contro il governo legittimo repubblicano di Spagna, rasero al suolo, con un bombardamento terroristico, la cittadina basca di Guernica.");

Insert into quadro()
values ("L'urlo","Urlo.jpg", "200x100", "Munch", "Cubismo", "199.99", "urletto pazzo");

Insert into quadro()
values ("Notte stellata","Nottestellata.jpg", "200x100", "Van Gogh", "Cubismo", "199.99", "bel quadro");

Insert into quadro()
values ("La persistenza della memoria","tempo.jpg", "200x100", "Dal�", "Cubismo", "179.99", "bel quadro");

Insert into quadro()
values ("La dama con l'ermellino","damaermellino.jpg", "200x100", "Da Vinci", "Cubismo", "279.99", "bel quadro");


insert into notifica(titolo, testo, dataeora, visualizzato, email)
values ("Per te", "consigli quadri pkwfwlfwn", '2021-12-20 18:00:00', false , "elia@ciao.com");

insert into Carrello(email)
values("elia@ciao.com");

insert into Compone(codCarrello, titolo)
values (1, "Guernica");