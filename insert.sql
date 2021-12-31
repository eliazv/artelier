Insert into utente()
values ("elia@ciao.com", "ciao", "elia", "zavatta", "via verdi 1", "Italia", 47035);

Insert into utente()
values ("pietro@ciao.com", "ciao", "pietro", "lelli", "via verdi 2", "Italia", 47122);

Insert into utente()
values ("giovanni@ciao.com", "ciao", "giovanni", "maffi", "via rossi 12", "Italia", 47065);

Insert into artista()
values ("Picasso", "Pablo", "picasso.jpg", 
"Nato il 25 ottobre 1881 e' uno dei piu' grandi artisti mai esistiti, fondatore del cubismo. ");

Insert into artista()
values ("Dali'", "Salvador", "dali.jpg", 
"Lo spagnolo Salvador Dali' (Figueres, 1904-1989) e' considerato uno dei piu' importanti artisti del XX secolo, ed uno degli esponenti di punta del Surrealismo.");

Insert into artista()
values ("Van Gogh", "Vincent", "vangogh.png", 
"Van gohh � molto bravo");

Insert into artista()
values ("Munch", "Edvard", "Munch.jpeg", 
"Munch � molto bravo");

Insert into artista()
values ("Da Vinci", "Leonardo", "leodavinci.jpg", 
"Leo � molto bravo");

Insert into artista()
values ("Kandinsky", "Vassilly", "kandisky.jpg", 
"Kandisky molto bravo");

Insert into artista()
values ("Friedrich", "Caspar David", "friedrich.jpg", 
"Friedrich molto bravo");

Insert into artista()
values ("Fussli", "Johann Heinrich", "fussli.jpg", 
"Fussli molto bravo");

Insert into artista()
values ("Turner", "William", "turner.jpg", 
"Turner molto bravo");

Insert into artista()
values ("Géricault", "Théodore", "gericault.jpg", 
"Gericault molto bravo");

Insert into artista()
values ("Delacroix", "Eugène", "delacroix.jpg", 
"delacroix molto bravo");

Insert into artista()
values ("Magritte", "Renè", "magritte.jpg", 
"magritte molto bravo");

Insert into artista()
values ("Cezanne", "Paul", "cezanne.jpg", 
"cezanne molto bravo");

Insert into artista()
values ("Mirò", "Joan", "miro.jpg", 
"mirò molto bravo");

Insert into artista()
values ("Renoir", "Pierre-Auguste", "renoir.jpg", 
"Renoir molto bravo");

Insert into artista()
values ("Monet", "Claude", "monet.jpg", 
"Monet molto bravo");


Insert into artista()
values ("Boccioni", "Umberto", "boccioni.jpg", 
"boccioni molto bravo");

insert into CorrenteArtistica()
values ("Cubismo", "cubismo.jpg", "Cubismo e' il termine col quale si e' soliti rappresentare una corrente artistica e culturale ben riconoscibile, distinta e fondante rispetto a molte altre correnti e movimenti che si sarebbero successivamente sviluppate. Tuttavia il cubismo non è un movimento capeggiato da un fondatore e non ha una direzione unitaria.");

insert into CorrenteArtistica()
values ("Espressionismo", "espressionismo.png", "Espressionismo bella corrente");

insert into CorrenteArtistica()
values ("Futurismo", "futurismo.jpg", "Futurismo bella corrente");

insert into CorrenteArtistica()
values ("Astrattismo", "astrattismo.png", "Astrattismo bella corrente");

insert into CorrenteArtistica()
values ("Realismo", "realismo.png", "Realismo bella corrente");

insert into CorrenteArtistica()
values ("Surrealismo", "surrealismo.png", "Surrealismo bella corrente");

insert into CorrenteArtistica()
values ("Impressionismo", "impressionismo.png", "Impressionismo bella corrente");

insert into CorrenteArtistica()
values ("Romanticismo", "romanticismo.png", "Romanticismo bella corrente");


Insert into quadro()
values ("Guernica","guernica.jpg", "200x100", "Picasso", "Cubismo", "299.99", "Il 26 aprile 1937, gli aerei tedeschi, in appoggio alle truppe del generale Franco contro il governo legittimo repubblicano di Spagna, rasero al suolo, con un bombardamento terroristico, la cittadina basca di Guernica.");

Insert into quadro()
values ("L'urlo","Urlo.jpg", "200x100", "Munch", "Cubismo", "199.99", "urletto pazzo");

Insert into quadro()
values ("Notte stellata","Nottestellata.jpg", "200x100", "Van Gogh", "Cubismo", "199.99", "bel quadro");

Insert into quadro()
values ("La persistenza della memoria","tempo.jpg", "200x100", "Dali'", "Cubismo", "179.99", "bel quadro");

Insert into quadro()
values ("La dama con l'ermellino","damaermellino.jpg", "200x100", "Da Vinci", "Cubismo", "279.99", "bel quadro");

insert into quadro()
values ("Composition 8","composition8.jpg", "300x200", "Kandinsky", "Astrattismo", "279.99", "bel quadro");

insert into quadro()
values ("I giocatori di carte","igiocatoridicarte.jpg", "60x50", "Cezanne", "Impressionismo", "90.99", "bel quadro");

insert into quadro()
values ("Il carnevale di Arlecchino","ilcarnevalediarlecchino.jpg", "70x90", "Mirò", "Surrealismo", "149.99", "bel quadro");

insert into quadro()
values ("La colazione dei canottieri","ilpranzodeicanottieri.jpg", "130x170", "Renoir", "Impressionismo", "179.99", "bel quadro");

insert into quadro()
values ("Impressione, levar del sole","impressionelevardelsole.jpg", "50x60", "Monet", "Impressionismo", "249.99", "bel quadro");

insert into quadro()
values ("Incubo","incubo.jpg", "100x130", "Fussli", "Romanticismo", "129.99", "bel quadro");

insert into quadro()
values ("La risata","larisata.jpg", "110x150", "Boccioni", "Futurismo", "159.99", "bel quadro");

insert into quadro()
values ("La zattera della medusa","lazatteradellamedusa.jpg", "500x720", "Gericault", "Romanticismo", "479.99", "bel quadro");

insert into quadro()
values ("La morte di Sardanapalo","mortedisandanapalo.jpg", "400x500", "Delacroix", "Romanticismo", "379.99", "bel quadro");

insert into quadro()
values ("Tempesta di neve","tempestadineve.jpg", "90x120", "Turner", "Romanticismo", "129.99", "bel quadro");

insert into quadro()
values ("Viandante sul mare di nebbia","viandantesumaredinebbia.jpg", "90x70", "Friedrich", "Romanticismo", "379.99", "bel quadro");



insert into notifica(titolo, testo, dataeora, visualizzato, email)
values ("Per te", "consigli quadri pkwfwlfwn", '2021-12-20 18:00:00', false , "elia@ciao.com");


insert into notifica(titolo, testo, dataeora, visualizzato, email)
values ("Ordine Confermato", "Abbiamo confermato il tuo ordine, il pacco verr� spedito a breve", '2021-12-20 19:00:00', true , "elia@ciao.com");

insert into quadro_ordinato(titoloQuaOrd, titoloq, arrivato)
values ("Guernica", "Guernica", 0);

insert into quadro_ordinato(titoloQuaOrd, titoloq, arrivato)
values ("Notte stellata", "Notte stellata", 1);

insert into Carrello(email, titolo, quantita)
values("elia@ciao.com", "Guernica", 2);

insert into Carrello(email, titolo, quantita)
values("elia@ciao.com", "Notte stellata", 1);

insert into Carrello(email, titolo, quantita)
values("pietro@ciao.com", "Guernica", 3);

