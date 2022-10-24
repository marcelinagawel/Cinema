<?php
require_once "connect.php";

if (!isset($_SESSION)) {
    session_start();
}

function chosenMovie()
{
    if (!empty($_GET["id"])) { //po wybraniu jakiegos zdejcia musi byc wybrane w linku jest id
        global $conn; //pobieram conna

        $id = $_GET['id']; //przypisuje idika z linka

        $stmt = $conn->prepare("SELECT id_oferta, filmy.id_film, filmy.tytul, filmy.opis, oferta.data from filmy, oferta where filmy.id_film = oferta.id_film AND filmy.id_film=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $film = $result->fetch_all();

?>

        <div id="titleFilm">
            <?php echo $film[0][2] ?>
        </div>

        <div id="container">
            <img id="photoFilm" src=<?php echo "../static/images/" . $film[0][1] . ".jpg" ?>>
            <div id="descriptionMovie">
                <?php echo $film[0][3] ?>
            </div>
        </div>

        <div id="dateFilm"> Wbierz datę rezerwacji:
            <?php
            for ($i = 0; $i < count($film); $i++) { //ile jest dat petla
            ?>
                    <a href=<?php echo './reservation.php?id=' . $film[$i][0] ?>><?php echo $film[$i][4] ?></a>
            <?php
            }
            ?>
        </div>

<?php
    }
}
?>

<?php include('header.php'); ?>

<div>
    <div id="descriptionMovie">
        <?php
        chosenMovie()
        ?>
    </div>
</div>