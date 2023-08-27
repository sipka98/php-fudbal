<?php

session_start();

$conn = require 'dbBroker.php';
require 'model/team.php';
$timoviBaza = Team::getAll($conn);

$izabraniTim = $_SESSION['izabraniTim'];

$timovi = [];

while($red = $timoviBaza->fetch_object()){
    $timovi[] = $red;
}

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
    <body>
        <?php
        include "header.php";
        ?>

        <div class="container p-2">

            <h1>Promeni broj titula</h1>
            <hr>

            <div class="row">
                <form method="post" action="serverIzmena.php">

                    <div class="col-12">
                        <label for="brojTitula">Novi broj titula</label>
                        <input type="number" id="brojTitula"  name="brojTitula" class="form-control">
                    </div>

                <hr>

                <input name="izabraniTim" type="hidden" id="izabraniTim" value=" <?= $izabraniTim ?>">



                <button class="btn btn-info" type="submit">Izmeni</button>

                </form>
            </div>


        </div>

        
        
    </body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    $( function() {
        $( "#datepicker" ).datepicker(
            {
                dateFormat: 'yy-mm-dd'
            }
        );
    } );
</script>

</html>