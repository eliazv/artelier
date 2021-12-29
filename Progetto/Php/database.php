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
    public function getCompone($codCarrello){
        $query = "SELECT titolo, quantita FROM compone WHERE codCarrello = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codCarrello);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

       //TUTTE LE NOTIFICHE
       public function getNotifiche(){
        $stmt = $this->db->prepare("SELECT * FROM notifica");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders(){
        $query = "SELECT quadro_ordinato.codQuadroOrdinato, quadro_ordinato.titolo, quadro_ordinato.quantita, quadro.immagine, quadro.prezzo, ordine.dataOrdine, ordine.dataConsegna FROM quadro_ordinato, quadro, carrello, compone, ordine WHERE quadro_ordinato.titolo = quadro.titolo AND quadro.titolo = compone.titolo AND compone.codCarrello = carrello.codCarrello AND carrello.codCarrello = ordine.codCarrello AND quadro_ordinato.arrivato = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDeliveredOrders(){
        $query = "SELECT quadro_ordinato.titolo, quadro_ordinato.quantita, quadro.immagine, quadro.prezzo FROM quadro_ordinato, quadro WHERE quadro_ordinato.titolo = quadro.titolo AND quadro_ordinato.arrivato = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    public function insertQuadro($titolo, $immagine, $dimensione, $artista, $prezzo, $nomeCorrArt, $descrizione){
        $query= "INSERT INTO quadro(titolo, immagine, dimensione, artista, prezzo, nomeCorrArt, descrizione) VALUES (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        //$stmt->bind_param('ii', $values, $index);
        $stmt->execute();
    }
}
?>