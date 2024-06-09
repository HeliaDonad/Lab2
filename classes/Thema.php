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

    public static function getThemaById($thema_id) {
        $conn = Db::getConnection();
        $query = "SELECT * FROM themas WHERE id = :thema_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Thema($row['id'], $row['naam'], $row['icoon'], $row['uitleg']);
        } else {
            return null; // Als het thema niet wordt gevonden, retourneer null
        }
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
