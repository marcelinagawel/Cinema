<?php
    require_once "connect.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    function showFilms($film){ ?>
        <div id="films_a">
            <a href= <?php echo "./descriptionMovie.php?id=" . $film['id_film'] ?>>
                <img src=<?php echo "../static/images/" . $film['id_film'] . '.jpg' ?>>
            </a>
        </div>
    <?php 
    } 

    function linkFilms($conn){ //lacze sie z baza danych przez conn
        $sql = "SELECT * FROM filmy"; 
        $result = $conn->query($sql);
        $films = array(); 

        while ($row = $result->fetch_assoc()) { 
            $films[$row['id_film']] = $row; 
        }

        if (!$films) {
            return; 
        }

        for($i = 1; $i <= count($films); $i++){ 
            showFilms($films[$i]); 
        }
    }
?>

<?php include('header.php');?>

<div>
    <div id="films">
        <?php 
            linkFilms($conn); 
        ?>
    </div>
</div>



</body>
</html>