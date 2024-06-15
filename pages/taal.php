<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meldingen</title>
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/taal.css?02566">


</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>

    <div class="meldingen">
        <h1>Taal</h1>
    </div>
    
    <div class="content">
        <img src="../images/talen/engels.svg" alt="">
        <div class="text-toggle">
            <p>English</p>
            <label class="switch">
                <input type="checkbox" class="toggle-input">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    
    <div class="content">
        <img src="../images/talen/nederlands.svg" alt="">
        <div class="text-toggle">
            <p>Nederlands</p>
            <label class="switch">
                <input type="checkbox" class="toggle-input" checked>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    
    <div class="content">
        <img src="../images/talen/frans.svg" alt="">
        <div class="text-toggle">
            <p>Français</p>
            <label class="switch">
                <input type="checkbox" class="toggle-input">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    
    <div class="content">
        <img src="../images/talen/duits.svg" alt="">
        <div class="text-toggle">
            <p>Deutsch</p>
            <label class="switch">
                <input type="checkbox" class="toggle-input">
                <span class="slider round"></span>
            </label>
        </div>
    </div>


<script src="../js/toggle.js"></script>
</body>
</html>