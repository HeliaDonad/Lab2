<?php 
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if(!empty($_POST)){
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $conn = Db::getConnection();
    $query = "SELECT email FROM password_resets WHERE token = :token";
    $stmt = $conn->prepare($query);
    $stmt->execute(['token' => $token]);
    $resetRequest = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resetRequest){
        $query = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->execute(['password' => $newPassword, 'email' => $resetRequest['email']]);

        $query = "DELETE FROM password_resets WHERE token = :token";
        $stmt = $conn->prepare($query);
        $stmt->execute(['token' => $token]);

        $message = "Uw wachtwoord is succesvol gewijzigd.";
    } else {
        $message = "De reset link is ongeldig of verlopen.";
    }
} else if(!empty($_GET['token'])){
    $token = $_GET['token'];
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord resetten</title>
    <link rel="stylesheet" href="../css/signin_login.css?12664">
    <link rel="stylesheet" href="../css/shared.css?23454">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <h1>Wachtwoord resetten</h1>
            <?php if(!empty($message)): ?> 
            <div class="form__error">
                <p><?php echo $message; ?></p>
            </div>
            <?php else: ?>
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div class="form__field">
                <label for="new_password">Nieuw Wachtwoord:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <input type="submit" value="Wachtwoord resetten" class="btn btn--primary">
            <?php endif; ?>
        </form>
    </main>
    <div class="image">
        <img src="" alt="afbeelding">
    </div>
</div>
</body>
</html>
