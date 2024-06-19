<?php
session_start();
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

$conn = Db::getConnection();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../signin_login_logout/login.php');
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meldingen</title>
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/taal.css?42566">
    <link rel="stylesheet" href="../css/footer.css?02593">

    <link rel="icon" href="../images/favicon/favicon.svg" type="image/svg+xml">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>

    <div class="container">
        <div class="taal">
            <h2>Taal</h2>
        </div>
        <div class="button-bar">
            <div class="content button">
                <img src="../images/talen/engels.svg" alt="">
                <div class="text-toggle">
                    <p>English</p>
                    <label class="switch">
                        <input type="checkbox" class="toggle-input">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div class="content button">
                <img src="../images/talen/nederlands.svg" alt="">
                <div class="text-toggle">
                    <p>Nederlands</p>
                    <label class="switch">
                        <input type="checkbox" class="toggle-input" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div class="content button">
                <img src="../images/talen/frans.svg" alt="">
                <div class="text-toggle">
                    <p>Français</p>
                    <label class="switch">
                        <input type="checkbox" class="toggle-input">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div class="content button">
                <img src="../images/talen/duits.svg" alt="">
                <div class="text-toggle">
                    <p>Deutsch</p>
                    <label class="switch">
                        <input type="checkbox" class="toggle-input">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../components/footer.inc.php"); ?>
    <script src="../js/toggle.js"></script>
</body>
</html>
