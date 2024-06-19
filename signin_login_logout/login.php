<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

function canLogin($pEmail, $pPassword){
    $conn = Db::getConnection();
    $query = "SELECT password FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $pEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($pPassword, $user['password'])){
        return true;
    } else {
        return false;
    }
}

if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(canLogin($email, $password)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_email'] = $email;  // Set user_email in session
        header("Location: ../dashboard.php");
        exit();
    } else {
        $error = "Ongeldig email of passwoord. Probeer nog eens."; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signin_login.css?89664">
    <link rel="stylesheet" href="../css/shared.css?23454">

    <link rel="icon" href="../images/favicon/favicon.svg" type="image/svg+xml">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <img class="logoL" src="../images/general/LogoL.svg" alt="logo">
            <h1>Log in.</h1>
            <?php if(!empty($error)): ?> 
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
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <img id="eye-icon" src="../images/iconen/eye-closed.svg" alt="eye">
                </span>
                <a href="forgot_password.php" class="forgot-password-link">Wachtwoord vergeten?</a>
            </div>
            <div class="form__field">
                <input type="submit" value="Inloggen" class="btn btn--primary btn-margin">   
            </div>
            <a href="signin.php">Ik heb nog geen account</a>
        </form>
    </main>  
    <div class="image">
        <img src="" alt="afbeelding">
    </div>
</body>
<script src="../js/eye.js"></script>
</html>
