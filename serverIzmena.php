<?php

$conn = require 'dbBroker.php';
include 'model/team.php';

$izabraniTim = trim($_POST['izabraniTim']);
$broj = trim($_POST['brojTitula']);

Team::updateTeam($conn, $izabraniTim, $broj);

header("Location: aboutTeam.php");

