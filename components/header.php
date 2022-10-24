<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kino | Gaweł</title>
    <link rel="stylesheet" href="../static/css/style.css"> 
</head>
<body>

<div id="header_container">
    <!-- przejscie do glownej strony -->
    <div>
        <a id="mainPage" href="./mainPage.php">REPERTUAR</a>
    </div>
    <div>
        <!-- otwieram sesje z przegladarka wiec moge te dane uzywac wszedzie -->
        <!-- jak nie jest puste (jest zalogowany) to zrob spana -->
        <?php
        if (!empty($_SESSION['zalogowany_user_id'])) {
        ?>
            <span id="logged">
                <?php echo $_SESSION['zalogowany_user_login'] ;?>   
                <!-- wyswietl nazwe kto jest zalogowany -->
            </span>
            <a href="./logOut.php">WYLOGUJ SIĘ</a>
            <!-- wrzuc buttona zeby mogl sie wylogowac -->
        <?php 
        } else {
        ?>
            <!-- jak nie jest zalogowany pokaz mu zeby sie zalogowal albo zarejestrowal -->
            <a id="signIn" href="./login.php">ZALOGUJ SIĘ</a>
            <a id="register" href="./register.php">ZAREJESTRUJ SIĘ</a>
        <?php 
        } 
        ?> 
    </div>
</div>
<!-- otwieram maina ale nie zamykam bo zamkne pozniej -->
<div class='main'>