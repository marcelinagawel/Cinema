<?php
require_once "connect.php";

if (!isset($_SESSION)) {
    session_start();
}

function correctLogin($login)
{
    if (strlen($login) != 0) {
        return true;
    } else {
        return false;
    }
}

function ifExists($login, $conn)
{
    $login = mysqli_real_escape_string($conn, $login);
    $sql = "SELECT * from uzytkownicy where login like'$login';" or die("nothing");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

function correctPassword($pass)
{
    if (strlen($pass) == 0) { //haslo ktore wpisuje nie puste
        return false;
    } else {
        return true;
    }
}

function correctPhone($number)
{
    if (preg_match('/^\d{9}$/', $number)) {
        return true;
    } else {
        return false;
    }
}

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['number'])) {
    $login = $_POST['login']; 
    $pass = $_POST['password'];
    $number = $_POST['number'];

    if (correctLogin($login) && correctPassword($pass) && correctPhone($number) && ifExists($login, $conn)) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $stmt = $conn->prepare("INSERT INTO `uzytkownicy`(`login`, `haslo`, `telefon`) VALUES (?,?,?)");
        $stmt->bind_param('ssi', $login, $pass, $number);
        $putInfo = "INSERT INTO `uzytkownicy`(`login`, `haslo`, `telefon`) VALUES ('$login','$pass','$number')";

        mysqli_query($conn, $putInfo);
    } else {
        echo 'Niepoprawne dane';
    }
}
?>

<?php include('header.php'); ?>

<div class="zarejestruj_sie">
    <form method="post">
        <h1 id="log_top"> ZAREJESTRUJ SIĘ </h1>
        <label for="login">Nazwa użytkownika: <input type="text" name="login"> </label>
        <label for="password">Hasło: <input type="password" name="password"></label>
        <label for="number">Numer telefonu: <input type="text" name="number" minlength="9" maxlength="9"></label>

        <input type="submit" value="Przeslij" class='button_wyslij' name="submit">
    </form>
    <br>
    <div>
        Masz już konto? <a href="./login.php">Zaloguj sie</a>
    </div>
</div>