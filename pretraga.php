<?php

$conn = require 'dbBroker.php';
include 'model/MatchGame.php';

$home = trim($_GET['home']);
$guest = trim($_GET['guest']);
$sortiranje = trim($_GET['sortiranje']);


$match = new MatchGame($conn);

$podaci =  $match->pretrazi($conn, $home, $guest, $sortiranje);

while($red = $podaci->fetch_assoc()){

?>


<tr>
    <td>
        <div class="teamTable">
            <img src="<?= $red['domacinSlika'] ?>" alt="" class="teamTablePic" width=150px>
            <p class="teamTableName"><?= $red['domacin'] ?></p>
        </div>
    </td>
    <td>
        <div class="teamTable1">
            <img src="assets/whistle.png" alt="" class="teamTablePic" width=100px>
            <p class="teamTableName"><?= $red['date'] . ' '. $red['time'] ?></p>
            <div class="buttons">
                <button class="btn btn-danger" onclick="obrisi(<?= $red['id'] ?>)">OBRIŠI</button>
            </div>
        </div>
    </td>
    <td>
        <div class="teamTable">
            <img src="<?= $red['gostSlika'] ?>" alt="" class="teamTablePic" width=150px>
            <p class="teamTableName"><?= $red['gost'] ?></p>
        </div>
    </td>


</tr>
<?php
}
?>
