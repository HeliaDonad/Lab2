<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Organisatie {
    private $id;
    private $naam;
    private $url;


    public function __construct($id, $naam, $url) {
        $this->id = $id;
        $this->naam = $naam;
        $this->url = $url;

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

}
