<?php
require_once "connect.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["zalogowany_user_login"])) {
    header("location:./notLoggedIn.php"); 
    exit();
}

function createPlaceholder()
{
    if (!empty($_GET['id'])) { 
        global $conn;
        $id = $_GET['id'];
        $sql = "SELECT id_oferta, filmy.tytul, oferta.data from filmy, oferta where oferta.id_film=filmy.id_film AND oferta.id_oferta=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $result = $stmt->get_result();
        $records = $result->fetch_assoc(); 
        $info_o_filmie = $records; 

        //pobiera mi informacje o miejsach czy sa zajete czy nie na konkretnym filmie i godzinie
        $sql = "SELECT rezerwacje.id_rezerwacja, oferta.id_oferta, filmy.id_film, filmy.tytul, oferta.data, rezerwacje.miejsce from filmy, oferta, rezerwacje where filmy.id_film = oferta.id_film AND rezerwacje.id_oferta = oferta.id_oferta AND rezerwacje.id_oferta=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $result = $stmt->get_result();
        $tablica = array();

        if ($result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) {
                $tablica[$row['miejsce']] = $row;
            }
        }
        $records = $tablica;
?>
        <input type="hidden" name="id" value=<?php echo $_SESSION['zalogowany_user_id']; ?>>
        <input type="hidden" name="id_oferta" value=<?php echo $_GET['id'] ?>>

        <div>
            <h2 id="reservationTitle">Film: <?php echo $info_o_filmie['tytul'] ?></h2>
            <h2 id="reservationDate">Termin: <?php echo $info_o_filmie['data'] ?></h2>
            <button id="reservationButton">ZAREZERWUJ</button>
        </div>

        <div class="board">
            <div class="row">
                <?php
                for ($j = 1; $j <= 20; $j++) { ?>
                    <div class="column"><?php echo $j; ?> </div>
                <?php }
                ?>
            </div>

            <?php
            for ($i = 1; $i <= 15; $i++) {
            ?>
                <div class="row">
                    <div class="column">
                        <?php echo $i ?>
                    </div>
                    <?php
                    for ($j = 1; $j <= 20; $j++) {
                        if (isset($records[$i . "-" . $j])) { 
                            echo '<div class="place placeOff"><input type="checkbox" checked disabled value="' . $i . '-' . $j . '"></div>';
                        } else { 
                            echo '<div class="place placeOn"><input class="miejsce" type="checkbox" name="place[]" value="' . $i . '-' . $j . '"></div>';
                        }
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
<?php
    } else {
        header('location:./mainPage.php');
        exit();
    }
}
?>

<?php include('header.php'); ?>

<form method="POST" action="./selectSeat.php" class="rezerwuj">
    <?php createPlaceholder() ?>
    <script defer> //wykona sie po zaladowaniu strony
        var miejsca = document.getElementsByClassName("miejsce")

        for (var i = 0; i < miejsca.length; i++) {
            miejsca[i].addEventListener("change", (e) => {
                var stan = e.target.parentNode
                stan.classList.toggle("active")
            })
        }
    </script>
</form>