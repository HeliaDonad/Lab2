<?php 
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if(!empty($_POST)){
    $email = $_POST['email'];
    $conn = Db::getConnection();
    $query = "SELECT id FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $token = bin2hex(random_bytes(50));
        $query = "INSERT INTO password_resets (email, token) VALUES (:email, :token)";
        $stmt = $conn->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token]);

        $resetLink = "http://yourdomain.com/reset_password.php?token=" . $token;
        // Stuur de reset link naar de gebruiker per e-mail
        // mail($email, "Password Reset", "Klik op deze link om je wachtwoord te resetten: " . $resetLink);
        
        $message = "Een reset link is naar uw emailadres gestuurd.";
    } else {
        $message = "Geen gebruiker gevonden met dit emailadres.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord vergeten</title>
    <link rel="stylesheet" href="../css/signin_login.css?12664">
    <link rel="stylesheet" href="../css/shared.css?23454">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <h1>Wachtwoord vergeten</h1>
            <?php if(!empty($message)): ?> 
            <div class="form__error">
                <p><?php echo $message; ?></p>
            </div>
            <?php endif; ?>
            <div class="form__field">
                <label for="email">Voer uw emailadres in:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <input type="submit" value="Verzenden" class="btn btn--primary">
        </form>
    </main>
    <div class="image">
        <img src="" alt="afbeelding">
    </div>
</div>
</body>
</html>
