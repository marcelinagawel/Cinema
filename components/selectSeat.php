<?php
require_once "connect.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["zalogowany_user_id"])) {
    header("location:./mainPage.php");
    exit();
}

function reservationInfo($place)
{
    global $conn;
    $sql = "SELECT id_rezerwacja from rezerwacje where miejsce like '$place' AND id_oferta =" . $_POST['id_oferta'] . "" or die(" ");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $takenSeat = false;
    } else {
        $takenSeat = true;
    }

    if ($takenSeat) { 
        global $conn;
        $stmt = $conn->prepare("insert into rezerwacje (id_oferta, miejsce, id_uzytkownik) values(?,?,?)") or die("nothing");
        $stmt->bind_param("isi", $_POST['id_oferta'], $place, $_POST['id']); 
        $stmt->execute();

?>
        <h2 id="takenSeat">Zarezerwowano miejsce <?php echo $place ?></h2>
    <?php

    } else {
    ?>
        <h2>Błąd rezerwacji miejsca <?php echo $place ?></h2>
    <?php
    }
}

function zarezerwuj()
{
    if (isset($_POST['place'])) {
        for ($i = 0; $i < count($_POST['place']); $i++) {
            reservationInfo($_POST['place'][$i]);
        }
    } else {
    ?>
        <h2 id="takenSeat">Wybierz miejsce</h2>
        <a href=<?php echo "./reservation.php?id=" . $_POST['id_oferta'] ?>>Powrót do rezerwacji miejsc</a>
<?php
    }
}
?>

<?php include("header.php"); ?>

<div>
    <?php
    zarezerwuj();
    ?>
    <br>
    <br>
    <a href="./mainPage.php">Powrót do strony głównej</a>
</div>