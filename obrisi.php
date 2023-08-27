<?php

$conn = require 'dbBroker.php';
include 'model/MatchGame.php';

$id = trim($_POST['id']);

$match = new MatchGame($conn);

if($match->delete($id)){
    echo "Upsesno obrisan mec";
}else{
    echo "Neuspesno obrisan mec";
}

