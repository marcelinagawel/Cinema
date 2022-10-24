<?php
//1. laczenie sie z baza

$server = "localhost";
$username = "root";
$password = "";
$database = "kino_gawel2";

$conn = new mysqli($server, $username, $password, $database);
$conn->query("SET NAMES 'utf8'"); //ustawienie kodowania polskich znakow
    if($conn->connect_error)
        die("Connection failed: ". $conn->connect_error);
?>