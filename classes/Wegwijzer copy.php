<?php
include_once("Db.php");
include_once("Organisatie.php");

class Wegwijzer {

    // Other existing methods...

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

    public static function getActionInstructiesByAction($action, $conn) {
        $query = "SELECT action_instructies FROM antwoorden WHERE action = :action";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":action", $action, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getDiscriminatieOrganisaties($conn) {
        return Organisatie::getSpecificOrganisaties($conn);
    }
}
?>
