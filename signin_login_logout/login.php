<?php 
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
        header("Location: ../index.php");
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
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
<div class="container">
    <main>
        <form action="" method="post">
            <h2>Log in.</h2>
            <?php if(!empty($error)): ?> 
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
                <input type="submit" value="Inloggen" class="btn btn--primary">   
            </div>
            <a href="signin.php">Ik heb nog geen account</a>
        </form>
    </main>  
    <div class="image">
            <img src="../images/afbeelding1.svg" alt="Afbeelding">
    </div>
</body>
</html>
