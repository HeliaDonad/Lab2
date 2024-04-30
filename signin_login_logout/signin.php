<?php 
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

if(!empty($_POST)){
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
            $options = [
                'cost' => 15
            ];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT, $options);
            $conn = Db::getConnection();
            $query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";
            session_start();
            $_SESSION['loggedin'] = true;
            $result = $conn->query($query);
            header("Location: ../index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <h2>Maak een account aan.</h2>
            <?php if(isset($error)): ?>
            <div class="form__error">
                <p><?php echo $error; ?></p>
            </div>
            <?php endif; ?>
            <div class="form__field">
                <label for="Email">Email</label>
                <input type="text" name="email">
            </div>
            <div class="form__field">
                <label for="Password">Wachtwoord</label>
                <input type="password" name="password">
            </div>
            <div class="form__field">
                <label for="ConfirmPassword">Bevestig wachtwoord</label>
                <input type="password" name="confirm_password"> 
            </div>

            <div class="form__field">
                <input type="submit" value="Aanmelden" class="btn btn--primary">   
            </div>
            <a href="login.php">Ik heb al een account</a>
        </form>
    </main>  
    <div class="image">
            <img src="../images/afbeelding1.svg" alt="Afbeelding">
    </div>
</body>
</html>
