<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Thema2 {
    private $id;
    private $naam;
    private $icoon;

    public function __construct($id, $naam, $icoon) {
        $this->id = $id;
        $this->naam = $naam;
        $this->icoon = $icoon;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getIcoon() {
        return $this->icoon;
    }

    public function getIcoonData() {
        // Haal de SVG-gegevens op uit de database
        $conn = Db::getConnection();
        $query = "SELECT icoon FROM themas2 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['icoon'];
    }
}

