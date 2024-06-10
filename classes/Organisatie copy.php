<?php
include_once("Db.php");

class Organisatie {
    private $id;
    private $naam;
    private $url;
    private $body_tekst;
    private $knop_url;
    private $knop_tekst;
    private $contact_tekst;

    public function __construct($id, $naam, $url, $body_tekst, $knop_url, $knop_tekst, $contact_tekst) {
        $this->id = $id;
        $this->naam = $naam;
        $this->url = $url;
        $this->body_tekst = $body_tekst;
        $this->knop_url = $knop_url;
        $this->knop_tekst = $knop_tekst;
        $this->contact_tekst = $contact_tekst;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getBodyTekst() {
        return $this->body_tekst;
    }

    public function getKnopUrl() {
        return $this->knop_url;
    }

    public function getKnopTekst() {
        return $this->knop_tekst;
    }

    public function getContactTekst() {
        return $this->contact_tekst;
    }

    public static function getSpecificOrganisaties($conn) {
        $query = "SELECT * FROM organisaties WHERE naam IN ('Instituut voor de gelijkheid van vrouwen en mannen', 'Vlaams Mensenrechteninstituut', 'Unia')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $organisaties = [];
        foreach ($rows as $row) {
            $organisaties[] = new self(
                $row['id'],
                $row['naam'],
                $row['url'],
                $row['body_tekst'],
                $row['knop_url'],
                $row['knop_tekst'],
                $row['contact_tekst']
            );
        }
        return $organisaties;
    }
}
?>
