<?php 
    require_once "connect.php";

    if (!isset($_SESSION)) {
        session_start();
    }   

    if (!empty($_POST['login']) && !empty($_POST['password'])) { //nie jest pusty login i haslo to
        $login = $_POST['login']; //ustaw mu login i haslo z posta
        $pass = $_POST['password'];

        $stmt = $conn->prepare("select id, login, haslo from uzytkownicy where login=?");
        $stmt->bind_param("s", $login); //string ma byc 
        $stmt->execute(); //wykonaj
        $result = $stmt->get_result(); //wez rezultat wyniki
        $user = $result->fetch_assoc(); 

        if ($user != null) { //jak sprawdzilam ze login nie jest pusty, null nie ma takiego usera
            if (password_verify($pass, $user['haslo'])) { //obsluga nieprawidlowego hasla, pass biore z posta
                $_SESSION['zalogowany_user_id'] = $user['id'];
                $_SESSION['zalogowany_user_login'] = $user['login'];
                
                header('location:./mainPage.php');  //to mnie wraca do glownej strony
            }
            else {
                $_SESSION['notification'] = 'Nieprawidlowe haslo';
            }
        }
        else {
            $_SESSION['notification'] = 'Nieprawidlowy login';
        }
    }
?>

<?php include('header.php'); ?>

    <div class="zarejestruj_sie">
        <form  method="post">
        <h1 id="log_top"> ZALOGUJ SIĘ </h1>
            <label for="login">Login: <input type="text" name="login"></label>
            <label for="password">Hasło: <input type="password" name="password"></label>
            <label for="submit"></label>
            <input type="submit" class='submitBtn' name='submit'>  
        </form>
        <br>
        <div>
            Nie masz konta? <a href="./register.php">Zarejestruj się</a>
        </div>
       
        <?php if(!empty($_SESSION['notification'])){?>
            <span><?php echo $_SESSION['notification']; ?></span> 
            <!-- wywali mi ze nieprawidlowy login -->
        <?php unset($_SESSION['notification']); }?>       
    </div>