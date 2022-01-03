<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    //TUTTI I QUADRI (quadri.html)
    public function getQuadri(){
        $query = "SELECT * FROM quadro";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //TUTTI GLI ARTISTI (artisti.html)
    public function getArtisti(){
        $query = "SELECT * FROM artista";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //TUTTE LE CATEGORIE (categorie.html)
    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM correnteartistica");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //N QUADRI RANDOM (home.html)
    public function getRandomQuadri($n){
        $stmt = $this->db->prepare("SELECT titolo, immagine, artista FROM quadro ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

     //N ARTISTI RANDOM (home.html)
     public function getRandomArtisti($n){
        $stmt = $this->db->prepare("SELECT nome, cognome, immagine FROM artista ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

         //N ARTISTI RANDOM (home.html)
    public function getRandomCategorie($n){
        $stmt = $this->db->prepare("SELECT nomeCorrArt, immagine FROM correnteartistica ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //TUTTE LE INFO DEL QUADRO DAL TITOLO (quadro.html)
    public function getQuadroByTitolo($id){
        $query = "SELECT * FROM quadro WHERE titolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuadritByCategoria($categoryName){
        $query = "SELECT titolo, immagine, dimensione, artista, prezzo, nomeCorrArt FROM quadro WHERE nomeCorrArt = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$categoryName);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuadriByArtista($artista){
        $query = "SELECT titolo, immagine, dimensione, artista, prezzo, nomeCorrArt FROM quadro WHERE artista = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$artista);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //tutti i quadri di un carrello specifico
    public function getCarrello($email){
        $query = "SELECT titolo, quantita FROM carrello WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUtente($email){
        $query = "SELECT * FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

       //TUTTE LE NOTIFICHE
       public function getNotifiche($email){
        $query ="SELECT * FROM notifica WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders($email){
        $query ="SELECT quadro_ordinato.titoloQuaOrd, quadro_ordinato.CodQuadroOrdinato, quadro_ordinato.quantita, quadro.immagine, quadro.prezzo, ordine.dataOrdine, ordine.dataConsegna FROM quadro_ordinato, quadro, utente, ordine WHERE quadro_ordinato.titoloQuaOrd = quadro.titolo AND quadro_ordinato.codOrdine = ordine.codOrdine AND ordine.email = utente.email AND ordine.arrivato = 0 AND utente.email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDeliveredOrders($email){
        $query ="SELECT quadro_ordinato.titoloQuaOrd, quadro_ordinato.CodQuadroOrdinato, quadro_ordinato.quantita, quadro.immagine, quadro.prezzo, ordine.dataOrdine, ordine.dataConsegna FROM quadro_ordinato, quadro, utente, ordine WHERE quadro_ordinato.titoloQuaOrd = quadro.titolo AND quadro_ordinato.codOrdine = ordine.codOrdine AND ordine.email = utente.email AND ordine.arrivato = 1 AND utente.email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSpecificCategory($category){
        $query = "SELECT * FROM correnteartistica WHERE nomeCorrArt = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$category);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    public function insertQuadro($titolo, $immagine, $dimensione, $artista, $prezzo, $nomeCorrArt, $descrizione){
        $query= "INSERT INTO quadro(titolo, immagine, dimensione, artista, prezzo, nomeCorrArt, descrizione) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssiss', $titolo, $immagine, $dimensione, $artista, $prezzo, $nomeCorrArt, $descrizione);
        $stmt->execute();
    }

    public function insertArtista($cognome, $nome, $immagine, $descrizione){
        $query= "INSERT INTO artista(cognome, nome, immagine, descrizione) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $cognome, $nome, $immagine, $descrizione);
        $stmt->execute();
    }

    public function insertCategoria($nome, $immagine, $descrizione){
        $query= "INSERT INTO correnteartistica(nomeCorrArt, immagine, descrizione) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $nome, $immagine, $descrizione);
        $stmt->execute();
    }

    public function insertInCarrello($email, $titolo, $quantità){
        $query= "INSERT INTO carrello(email, titolo, quantita) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $email, $titolo, $quantità);
        $stmt->execute();
    }

    public function insertUser($email, $password, $nome, $cognome, $venditore, $indirizzo, $città, $paese, $cap){
        $query= "INSERT INTO utente(email, passwordd, nome, cognome, venditore, indirizzo, città, paese, cap) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssisssi', $email, $password, $nome, $cognome, $venditore, $indirizzo, $città, $paese, $cap);
        $stmt->execute();
    }

    public function insertNotifica($titolo, $testo, $dataeora, $visualizzato, $email){
        $query= "INSERT INTO notifica(titolo, testo, dataeora, visualizzato, email) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssis', $titolo, $testo, $dataeora, $visualizzato, $email);
        $stmt->execute();
    }

    public function checkLogin($email, $password){
        $query = "SELECT email, cognome FROM utente WHERE email = ? AND passwordd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    public function countNotifiche($email){
        $query ="SELECT COUNT(*) AS num FROM notifica WHERE email=? AND visualizzato = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateIndirizzo($email, $indirizzo){
        $query ="UPDATE utente SET indirizzo=? WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $indirizzo, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->execute();
    }

    public function updateCitta($email, $citta){
        $query ="UPDATE utente SET citta=? WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $citta, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->execute();
    }

    public function updatePaese($email, $paese){
        $query ="UPDATE utente SET paese=? WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $paese, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->execute();
    }
    
    public function updateCap($email, $cap){
        $query ="UPDATE utente SET cap=? WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $cap, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->execute();
    }

    public function updatePassword($email, $password){
        $query ="UPDATE utente SET passwordd=? WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $password, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $stmt->execute();
    }

    public function deleteCart($email){
        $qery ="DELETE FROM carrello WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
    }

    public function insertOrder($email, $dataOrdine, $dataConsegna, $arrivato){
        $query= "INSERT INTO ordine(email, dataOrdine, dataConsegna, arrivato) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $email, $dataOrdine, $dataConsegna, $arrivato);
        $stmt->execute();
    }

    public function insertOrderedPainting($codOrdine, $titoloQuaOrd, $quantita){
        $query= "INSERT INTO quadro_ordinato(codOrdine, titoloQuaOrd, quantita) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isi', $codOrdine, $titoloQuaOrd, $quantita);
        $stmt->execute();
    }

    public function getLastOrder($email){
        $stmt = $this->db->prepare("SELECT codOrdine FROM ordine WHERE email = ? ORDER BY codOrdine DESC LIMIT 1");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>