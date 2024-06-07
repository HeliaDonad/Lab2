<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Thema {
    private $id;
    private $naam;
    private $icoon;
    private $uitleg;

    public function __construct($id, $naam, $icoon, $uitleg) {
        $this->id = $id;
        $this->naam = $naam;
        $this->icoon = $icoon;
        $this->uitleg = $uitleg;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getIcoon() {
        return $this->naam;
    }

    public function getIcoonData() {
        // Haal de SVG-gegevens op uit de database
        $conn = Db::getConnection();
        $query = "SELECT icoon FROM themas WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['icoon'];
    }

    public function getUitleg() {
        return $this->uitleg;
    }
}
?>
