<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Organisatie {
    private $id;
    private $naam;
    private $url;
    private $icoon;

    public function __construct($id, $naam, $url, $icoon) {
        $this->id = $id;
        $this->naam = $naam;
        $this->url = $url;
        $this->icoon = $icoon;
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

    public function getIcoon() {
        return $this->icoon;
    }
}
