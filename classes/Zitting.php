<?php
class Zitting {
    private $id;
    private $titel;
    private $info;
    private $taal;
    private $datum;
    private $tijd;
    private $plaats;
    private $info_icoon;
    private $taal_icoon;
    private $datum_icoon;
    private $tijd_icoon;
    private $plaats_icoon;

    public function __construct($id, $titel, $info, $taal, $datum, $tijd, $plaats, $info_icoon, $taal_icoon, $datum_icoon, $tijd_icoon, $plaats_icoon) {
        $this->id = $id;
        $this->titel = $titel;
        $this->info = $info;
        $this->taal = $taal;
        $this->datum = $datum;
        $this->tijd = $tijd;
        $this->plaats = $plaats;
        $this->info_icoon = $info_icoon;
        $this->taal_icoon = $taal_icoon;
        $this->datum_icoon = $datum_icoon;
        $this->tijd_icoon = $tijd_icoon;
        $this->plaats_icoon = $plaats_icoon;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitel() {
        return $this->titel;
    }

    public function getInfo() {
        return $this->info;
    }

    public function getTaal() {
        return $this->taal;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function getTijd() {
        return $this->tijd;
    }

    public function getPlaats() {
        return $this->plaats;
    }

    public function getInfoIcoon() {
        return $this->info_icoon;
    }

    public function getTaalIcoon() {
        return $this->taal_icoon;
    }

    public function getDatumIcoon() {
        return $this->datum_icoon;
    }

    public function getTijdIcoon() {
        return $this->tijd_icoon;
    }

    public function getPlaatsIcoon() {
        return $this->plaats_icoon;
    }
}
?>