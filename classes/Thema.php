<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class Thema {
    private $id;
    private $naam;

    public function __construct($id, $naam) {
        $this->id = $id;
        $this->naam = $naam;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }
}
