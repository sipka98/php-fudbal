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

            <h1>Predstojeci mecevi tima </h1>
            <hr>

            <div class="row">
                <form method="post" action="server.php">
                <div class="col-12">
                    <label for="tim">Domacin</label>
                    <select name="domacin" id="domacin" class="form-control">
                        <?php
                        foreach ($timovi as $tim) {
                            ?>
                            <option value="<?= $tim->id ?>"><?= $tim->name ?></option>
                            <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="col-12">
                    <label for="tim">Gost</label>
                    <select name="gost" id="gost" class="form-control">
                        <?php
                        foreach ($timovi as $tim) {
                            ?>
                            <option value="<?= $tim->id ?>"><?= $tim->name ?></option>
                            <?php
                        }

                        ?>
                    </select>
                </div>

                    <div class="col-12">
                        <label for="datepicker">Datum</label>
                        <input type="text" id="datepicker" name="datum" class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="time">Vreme</label>
                        <input type="text" id="time" placeholder="Unesite u formatu HH:mm:ss" name="time" class="form-control">
                    </div>

                <hr>

                <input type="hidden" id="izabraniTim" value=" <?= $izabraniTim ?>">

                <hr>


                <button class="btn btn-info" type="submit">Dodaj</button>

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