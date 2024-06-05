<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Thema.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedFilterId'])) {
    $selectedFilterId = $_POST['selectedFilterId'];

    // Query om thema's te selecteren die overeenkomen met het geselecteerde filter
    $conn = Db::getConnection();
    $query = "SELECT t.id, t.naam, t.icoon 
              FROM themas t 
              JOIN thema_filters tf ON t.id = tf.thema_id 
              WHERE tf.filter_id = :filter_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":filter_id", $selectedFilterId, PDO::PARAM_INT);
    $stmt->execute();
    $themas = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $themas[] = new Thema($row['id'], $row['naam'], $row['icoon']);
    }

    // Geef de gefilterde thema's terug als JSON-respons
    header('Content-Type: application/json');
    echo json_encode($themas);
}
?>
