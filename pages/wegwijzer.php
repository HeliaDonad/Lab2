<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);
$conn = Db::getConnection();

$query = "SELECT * FROM themas WHERE id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$thema = new Thema($row['id'], $row['naam'], null, $row['uitleg']);

$query = "SELECT * FROM questions WHERE id = :question_id AND theme_id = :theme_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":question_id", $question_id, PDO::PARAM_INT);
$stmt->bindParam(":theme_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema->getNaam()); ?> - Wegwijzer</title>
    <link rel="stylesheet" href="../css/nav.css?48987">
    <link rel="stylesheet" href="../css/wegwijzer.css?89095">
    <link rel="stylesheet" href="../css/shared.css?18845">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h3>Mijn wegwijzer</h3>
        <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
        <div id="question-container">
            <?php
                $question_id = isset($_GET['question_id']) ? intval($_GET['question_id']) : 1; // Start with the first question
                $query = "SELECT * FROM questions WHERE id = :question_id AND theme_id = :theme_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":question_id", $question_id, PDO::PARAM_INT);
                $stmt->bindParam(":theme_id", $thema_id, PDO::PARAM_INT);
                $stmt->execute();
                $question = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($question) {
                    echo '<p>' . htmlspecialchars($question['question_text']) . '</p>';
                    $query = "SELECT * FROM answers WHERE question_id = :question_id";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":question_id", $question_id, PDO::PARAM_INT);
                    $stmt->execute();
                    $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($answers as $answer) {
                        $next_question_id = $answer['next_question_id'] ? '&question_id=' . $answer['next_question_id'] : '';
                        $action = $answer['action'] ? '&action=' . $answer['action'] : '';
                        echo '<button class="answer-button" onclick="location.href=\'wegwijzer.php?thema_id=' . $thema_id . $next_question_id . $action . '\'">' . htmlspecialchars($answer['answer_text']) . '</button>';
                    }
                } else {
                    echo '<p>Geen verdere vragen beschikbaar.</p>';
                }

                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                    $query = "SELECT action_instructions FROM answers WHERE action = :action";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":action", $action, PDO::PARAM_STR);
                    $stmt->execute();
                    $action_instructions = $stmt->fetch(PDO::FETCH_ASSOC)['action_instructions'];

                    echo '<p>' . htmlspecialchars($action_instructions) . '</p>';
                    
                    switch ($action) {
                        case 'RETURN_TO_DASHBOARD':
                            echo '<button onclick="location.href=\'dashboard.php\'">Mijn wegwijzer</button>';
                            echo '<button onclick="location.href=\'index.php\'">Beginscherm</button>';
                            break;
                        case 'CONTACT_ORGANIZATIONS':
                            $query = "SELECT * FROM organizations";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $organisaties = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            echo '<ul>';
                            foreach ($organisaties as $organisatie) {
                                echo '<li>' . htmlspecialchars($organisatie['name']) . ': <a href="' . htmlspecialchars($organisatie['url']) . '">' . htmlspecialchars($organisatie['url']) . '</a></li>';
                            }
                            echo '</ul>';
                            break;
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
