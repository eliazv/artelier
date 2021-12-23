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
        $stmt = $this->db->prepare("SELECT titolo, immagine, autore FROM quadro ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //TUTTE LE INFO DEL QUADRO DAL TITOLO (quadro.html)
    public function getQuadroByTitolo($id){
        $query = "SELECT * FROM quadro WHERE titolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getQuadritByCategoria($idcategory){
        $query = "SELECT titolo, immagine, dimensione, autore, prezzo, nomeCorrArt FROM quadro WHERE nomeCorrArt = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuadritByArtista($idartista){
        $query = "SELECT titolo, immagine, dimensione, autore, prezzo, nomeCorrArt FROM quadro WHERE artista = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idartista);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
   
}
?>