<?php
include_once("Db.php");

class Wegwijzer {

    public static function getVraagByIdAndThemaId($vraag_id, $thema_id) {
        $conn = Db::getConnection();
        $query = "SELECT * FROM vragen WHERE id = :vraag_id AND thema_id = :thema_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":vraag_id", $vraag_id, PDO::PARAM_INT);
        $stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    

    public static function getAntwoordenByVraagId($vraag_id) {
        $conn = Db::getConnection();
        $query = "SELECT * FROM antwoorden WHERE vraag_id = :vraag_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":vraag_id", $vraag_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getActionInstructiesByAction($action) {
        $conn = Db::getConnection();
        $query = "SELECT action_instructies FROM antwoorden WHERE action = :action";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":action", $action, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['action_instructies'];
    }

    public static function getDiscriminatieOrganisaties() {
        $conn = Db::getConnection();
        $query = "SELECT * FROM discriminatieorganisaties";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
