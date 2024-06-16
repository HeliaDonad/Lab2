<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../signin_login_logout/login.php');
    exit();
}

$userEmail = $_SESSION['user_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

    // Verifieer het wachtwoord
    $conn = Db::getConnection();
    $query = "SELECT id, password FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $userEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Verwijder de gebruiker
        $deleteQuery = "DELETE FROM users WHERE id = :id";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->execute(['id' => $user['id']]);

        // Log de gebruiker uit en vernietig de sessie
        session_destroy();
        header('Location: ../signin_login_logout/signin.php');
        exit();
    } else {
        $error = "Wachtwoord is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verwijderen</title>
    <link rel="stylesheet" href="../css/verwijder_acc.css?12345">
    <link rel="stylesheet" href="../css/shared.css?23454">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <h1>Account Verwijderen</h1>
            <p>Om uw account te verwijderen, moet u eerst uw huidige wachtwoord invoeren.</p>
            <?php if(!empty($error)): ?> 
            <div class="form__error">
                <p><?php echo $error; ?></p>
            </div>
            <?php endif; ?>
            <div class="form__field">
                <label for="Password">Huidig Wachtwoord</label>
                <input type="password" name="password" id="password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', 'eye-icon')">
                    <img id="eye-icon" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <input type="submit" value="Verwijder Account" class="btn btn--primary btn-margin">   
            </div>
        </form>
    </main>  
</div>
</body>
<script>
    function togglePasswordVisibility(inputId, iconId) {
        var passwordField = document.getElementById(inputId);
        var eyeIcon = document.getElementById(iconId);

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.src = '../images/iconen/eye-open.svg';
        } else {
            passwordField.type = 'password';
            eyeIcon.src = '../images/iconen/eye-closed.svg';
        }
    }
</script>
</html>