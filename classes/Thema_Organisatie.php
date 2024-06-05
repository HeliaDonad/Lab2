<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . "./Db.php");

class ThemaOrganisatie {
    private $id;
    private $thema_id;
    private $organisatie_id;

    public function __construct($id, $thema_id, $organisatie_id) {
        $this->id = $id;
        $this->thema_id = $thema_id;
        $this->organisatie_id = $organisatie_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getThemaId() {
        return $this->thema_id;
    }

    public function getOrganisatieId() {
        return $this->organisatie_id;
    }
}
