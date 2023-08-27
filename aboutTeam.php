
<?php 
session_start();
$conn = require 'dbBroker.php';
require "model/team.php";

$idTima = $_SESSION['izabraniTim'];

$tim = Team::getById($conn,$idTima);
$timPodaci = $tim->fetch_assoc();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>O timu</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styleAboutTeam.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        
        <div class="info">
            <div class="info-left">

                <div class="flag1">
                    <img src="<?php echo $timPodaci['flagPicture']?>" alt="flag" width= 250px>
                    <p class="country"><?php echo $timPodaci['country']?></p> 
            
                </div>
                <div class="coach">
                    <img src="<?php echo $timPodaci['coachPicture']?>" alt="coachPicture" width= 250px>
                    <p class="coachP"><?php echo $timPodaci['coach']?></p> 
            
                  </div>
                
            </div>
            <div class="info-center">  

                
                <div class="card">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="<?php echo $timPodaci['picturePath']?>" alt="" class="card-img">
                        </div> 

                    </div>
                    <div class="card-content">
                        <h2 class="name">
                        <?php echo $timPodaci['name']?>
                        </h2>
                        <a href="izmeni.php">Izmeni broj trofeja</a>
                    </div>
                </div>
                <div class="circle">
            
                    <img src="assets/cup.png" alt="" class="champion" width= 50px>
                    <p class="titles">: <?php echo $timPodaci['numberOfTitles']?></p>

                </div>
                
            </div>
            <div class="info-right"> 
                <div class="flag1">
                    <img src="<?php echo $timPodaci['homeDress']?>" alt="flag" width= 150px>
                    <p class="country">Home Kit</p> 
            
                </div>
                <div class="coach">
                    <img src="<?php echo $timPodaci['awayDress']?>" alt="coachPicture" width= 150px>
                    <p class="coachP"> Away Kit</p> 
            
                  </div>
            </div>
        </div>

        


   <script>

    document.getElementById("izmeni").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "flex";

            document.querySelector(".close").addEventListener("click", function(){
                document.querySelector(".popup").style.display = "none";
            })

    })

   </script>
       
    </body>
</html>