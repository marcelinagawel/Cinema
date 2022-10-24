<?php 

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['zalogowany_user_id']); //usuwam zmienna id po wylogowaniu
unset($_SESSION['zalogowany_user_login']);

header("location:./mainPage.php"); //wracam do glownej

session_destroy(); //usun sesje aktualna
exit(); 
?>