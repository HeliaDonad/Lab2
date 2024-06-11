<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Organisatie {
    private $id;
    private $naam;
    private $url;
    private $body_tekst;
    private $knop_url;
    private $knop_tekst;
    private $contact_tekst;
    private $contact_url;

    public function __construct($id, $naam, $url, $body_tekst, $knop_url, $knop_tekst, $contact_tekst, $contact_url) {
        $this->id = $id;
        $this->naam = $naam;
        $this->url = $url;
        $this->body_tekst = $body_tekst;
        $this->knop_url = $knop_url;
        $this->knop_tekst = $knop_tekst;
        $this->contact_tekst = $contact_tekst;
        $this->contact_url = $contact_url;
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

    public function getContactUrl() {
        return $this->contact_url;
    }
}
