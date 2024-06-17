<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../signin_login_logout/login.php');
    exit();
}

$userEmail = $_SESSION['user_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Verifieer het oude wachtwoord
    $conn = Db::getConnection();
    $query = "SELECT id, password FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $userEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($oldPassword, $user['password'])) {
        if ($newPassword === $confirmPassword) {
            // Update het wachtwoord
            $options = ['cost' => 15];
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT, $options);
            $updateQuery = "UPDATE users SET password = :password WHERE id = :id";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->execute(['password' => $passwordHash, 'id' => $user['id']]);

            $success = "Wachtwoord succesvol gewijzigd.";
        } else {
            $error = "Nieuw wachtwoord en bevestig wachtwoord komen niet overeen.";
        }
    } else {
        $error = "Oud wachtwoord is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig Wachtwoord</title>
    <link rel="stylesheet" href="../css/wijzig_wachtwoord.css?99345">
    <link rel="stylesheet" href="../css/shared.css?29454">
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/footer.css?02593">
</head>
<body>
<?php include_once("../components/headerPages.inc.php"); ?>
<div class="container">
    <main>
        <form id="changePasswordForm" action="" method="post">
            <h2>Wijzig Wachtwoord</h2>
            <p>Om uw wachtwoord te wijzigen, voer uw oude wachtwoord in en kies een nieuw wachtwoord.</p>
            <?php if(!empty($error)): ?> 
            <div class="form__error">
                <p><?php echo $error; ?></p>
            </div>
            <?php elseif(!empty($success)): ?> 
            <div class="form__success">
                <p><?php echo $success; ?></p>
            </div>
            <?php endif; ?>
            <div class="form__field">
                <label for="old_password">Oud Wachtwoord</label>
                <input type="password" name="old_password" id="old_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('old_password', 'eye-icon-old')">
                    <img id="eye-icon-old" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <label for="new_password">Nieuw Wachtwoord</label>
                <input type="password" name="new_password" id="new_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('new_password', 'eye-icon-new')">
                    <img id="eye-icon-new" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <label for="confirm_password">Bevestig Nieuw Wachtwoord</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirm_password', 'eye-icon-confirm')">
                    <img id="eye-icon-confirm" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <input type="submit" value="Opslaan" class="btn btn--primary btn-margin">   
            </div>
        </form>
    </main>  
</div>
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
<?php include_once("../components/footer.inc.php"); ?>
</body>
</html>
