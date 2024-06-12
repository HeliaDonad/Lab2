<?php
class Zitting {
    private $titel;
    private $info;
    private $taal;
    private $datum;
    private $tijd;
    private $plaats;
    private $infoIcoon;
    private $taalIcoon;
    private $datumIcoon;
    private $tijdIcoon;
    private $plaatsIcoon;

    public function __construct($titel, $info, $taal, $datum, $tijd, $plaats, $infoIcoon, $taalIcoon, $datumIcoon, $tijdIcoon, $plaatsIcoon) {
        $this->titel = $titel;
        $this->info = $info;
        $this->taal = $taal;
        $this->datum = $datum;
        $this->tijd = $tijd;
        $this->plaats = $plaats;
        $this->infoIcoon = $infoIcoon;
        $this->taalIcoon = $taalIcoon;
        $this->datumIcoon = $datumIcoon;
        $this->tijdIcoon = $tijdIcoon;
        $this->plaatsIcoon = $plaatsIcoon;
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
        return $this->infoIcoon;
    }

    public function getTaalIcoon() {
        return $this->taalIcoon;
    }

    public function getDatumIcoon() {
        return $this->datumIcoon;
    }

    public function getTijdIcoon() {
        return $this->tijdIcoon;
    }

    public function getPlaatsIcoon() {
        return $this->plaatsIcoon;
    }
}
?>
