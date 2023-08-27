<?php

$conn = require 'dbBroker.php';
include 'model/MatchGame.php';

$domacin = trim($_POST['domacin']);
$gost = trim($_POST['gost']);
$datum = trim($_POST['datum']);
$vreme = trim($_POST['time']);



$match = new MatchGame($conn);

if($match->dodaj($domacin, $gost, $datum, $vreme)){
    header("Location: fixtures.php?poruka=Uspesno dodat mec");
}else{
    header("Location: fixtures.php?poruka=Neuspesno dodat mec");
}

