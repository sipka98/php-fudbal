<?php

$conn = require "dbBroker.php";
require "model/team.php";


session_start();
$red= array();
$timovi = Team::getAll($conn);


if (!$timovi) {
    echo "Nastala je greška pri preuzimanju timova";
    die();
}
if ($timovi->num_rows == 0) {
    echo "Nema timova u bazi";
    die();
}


if (isset($_POST['izaberi']) && $_POST['izaberi']== 'Izaberi tim') {
    $idTima=$_POST['id'];
    $_SESSION['izabraniTim'] = $idTima;
    header("Location: aboutTeam.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/swiper-bundle.min.css" class="rel">
    <link rel="stylesheet" href="css/style.css" class="rel">
    <title>proba</title>
</head>
<body>

<div class="naslov"> <h1>IZABERI TIM</h1></div>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">


        <?php
                    while ($red = $timovi->fetch_array()) :


                    ?>
                        
                        
            <div class="card swiper-slide">
                <div class="image-content">
                   <span class="overlay"></span>
                   <div class="card-image">
                    <img src="<?php echo $red["picturePath"]?>" alt="" class="card-img">
                   </div> 

                </div>
                <div class="card-content">
                    <h2 class="name">
                        <?php echo $red["name"]?>
                    </h2>
                    <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $red['id']; ?>">
                            <input class = "button" type="submit" name="izaberi" value="Izaberi tim">
                        </form>

                </div>
            </div>

                <?php
                    endwhile;
                 
                ?>
    
        </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
</div>
    
</body>

<script src="js/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>


</html>