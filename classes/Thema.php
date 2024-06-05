<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Thema {
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
}
