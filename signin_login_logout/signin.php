<?php 
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; 

    if ($password !== $confirmPassword) {
        $error = "Wachtwoorden komen niet overeen";
    } else {
        // e-mailadres geldig?
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Als het e-mailadres niet geldig is, foutmelding 
            $error = "Ongeldig e-mailadres";
        } else {
            $conn = Db::getConnection();

            // Controleer of het e-mailadres al bestaat
            $checkQuery = "SELECT email FROM users WHERE email = :email";
            $stmt = $conn->prepare($checkQuery);
            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() > 0) {
                $error = "E-mailadres is al in gebruik";
            } else {
                $options = ['cost' => 15];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT, $options);

                $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
                $stmt = $conn->prepare($query);
                $result = $stmt->execute(['email' => $email, 'password' => $passwordHash]);

                if ($result) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_email'] = $email; // Set user_email in session
                    header("Location: ../dashboard.php");
                    exit();
                } else {
                    $error = "Er is een fout opgetreden tijdens het aanmaken van het account";
                }
            }
        }
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signin_login.css?88385">
    <link rel="stylesheet" href="../css/shared.css?12345">

    <link rel="icon" href="../images/favicon/favicon.svg" type="image/svg+xml">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <img class="logoL" src="../images/general/LogoL.svg" alt="logo">
            <h1>Maak een account aan.</h1>
            <?php if(isset($error)): ?>
            <div class="form__error">
                <p><?php echo $error; ?></p>
            </div>
            <?php endif; ?>
            <div class="form__field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form__field">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', 'eye-icon-1')">
                    <img id="eye-icon-1" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <label for="confirm_password">Bevestig wachtwoord</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirm_password', 'eye-icon-2')">
                    <img id="eye-icon-2" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
            </div>
            <div class="form__field">
                <input type="submit" value="Aanmelden" class="btn btn--primary">   
            </div>
            <a href="login.php">Ik heb al een account</a>
        </form>
    </main>  
    <div class="image">
        <img src="" alt="afbeelding">
    </div>
</body>
</html>
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
