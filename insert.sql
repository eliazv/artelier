Insert into utente()
values ("elia@ciao.com", "ciao", "elia", "zavatta");

Insert into utente()
values ("pietro@ciao.com", "ciao", "pietro", "lelli");

Insert into utente()
values ("giovanni@ciao.com", "ciao", "giovanni", "maffi");

Insert into artista()
values ("Picasso", "Pablo", "https://it.wikipedia.org/wiki/File:Pablo_picasso_1.jpg", 
"Nato il 25 ottobre 1881 è uno dei più grandi artisti mai esistiti, fondatore del cubismo. ");

Insert into artista()
values ("Dalì", "Salvador", "https://wips.plug.it/cips/supereva/cms/2017/07/baffi-dali.jpg?w=850&a=r", 
"Lo spagnolo Salvador Dalí (Figueres, 1904-1989) è considerato uno dei più importanti artisti del XX secolo, ed uno degli esponenti di punta del Surrealismo.");

insert into CorrenteArtistica()
values ("Cubismo", "https://i0.wp.com/www.hisour.com/wp-content/uploads/2018/07/Proto-Cubism.jpg?w=960&ssl=1", "Cubismo è il termine col quale si è soliti rappresentare una corrente artistica e culturale ben riconoscibile, distinta e fondante rispetto a molte altre correnti e movimenti che si sarebbero successivamente sviluppate. Tuttavia il cubismo non è un movimento capeggiato da un fondatore e non ha una direzione unitaria.");

Insert into quadro()
values ("Guernica","https://left.it/wp-content/uploads/2017/04/guernica-e1493197573547.jpg", "200x100", "Picasso", "Cubismo", "299.99", "Il 26 aprile 1937, gli aerei tedeschi, in appoggio alle truppe del generale Franco contro il governo legittimo repubblicano di Spagna, rasero al suolo, con un bombardamento terroristico, la cittadina basca di Guernica.");

insert into notifica(titolo, testo, dataeora, visualizzato, email)
values ("Per te", "consigli quadri pkwfwlfwn", '2021-12-20 18:00:00', false , "elia@ciao.com");

insert into Carrello(email)
values("elia@ciao.com");

insert into Compone(codCarrello, titolo)
values (1, "Guernica");