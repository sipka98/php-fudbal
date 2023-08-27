<?php

session_start();

    $conn = require 'dbBroker.php';
    require 'model/team.php';
    $timovi = Team::getAll($conn);

    $poruka = isset($_GET['poruka']) ? $_GET['poruka'] : '';

$izabraniTim = $_SESSION['izabraniTim'];

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
    </head>
    <body>
        <?php
        include "header.php";
        ?>

        <div class="container p-2">

            <h1>Predstojeci mecevi tima </h1>

            <?php
                if($poruka != ''){
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $poruka ?></strong>
                    </div>
            <?php
                }

            ?>

            <hr>
            <a class="btn btn-info mb-2" href="dodaj.php">DODAJ UTAKMICU</a>

            <div class="row">
                <div class="col-12">
                    <label for="tim">Pretrazi po protivniku</label>
                    <select id="tim" class="form-control">
                        <option value="0">Vrati sve</option>
                        <?php
                        while($red = $timovi->fetch_object()){
                            ?>
                            <option value="<?= $red->id ?>"><?= $red->name ?></option>
                            <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="col-12">
                    <label for="datum">Sortiraj po datumu</label>
                    <select id="datum" class="form-control">
                        <option value="desc">Opadajuce</option>
                        <option value="asc">Rastuce</option>
                    </select>
                </div>

                <input type="hidden" id="izabraniTim" value=" <?= $izabraniTim ?>">

                <hr>


                <button class="btn btn-info" onclick="pretrazi()">Pretrazi</button>
            </div>

            <div class="col-12">
                <table id="myTable" class="table table-hover text-center">
                    <thead class="thead">
                    <tr>
                        <th scope="col">DOMAĆIN</th>
                        <th scope="col">DATUM</th>
                        <th scope="col">GOST</th>
                    </tr>
                    </thead>
                    <tbody id="podaci">

                    </tbody>
                </table>
            </div>


        </div>

        
        
    </body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>

<script>
    function pretrazi(){
        $.ajax({
            url: 'pretraga.php',
            data: {
                home: $("#izabraniTim").val(),
                guest: $("#tim").val(),
                sortiranje: $("#datum").val()
            },
            success: function (data){
                $("#podaci").html(data);
            }
        })
    }

    pretrazi();

    function obrisi(id){

        alert("Brisem mec " + id);

        $.ajax({
            url: 'obrisi.php',
            method: 'POST',
            data: {
                id: id,
            },
            success: function (data){
                pretrazi();
            }
        })
    }
</script>
</html>