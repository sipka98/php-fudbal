<?php


class Team {

public $id;
public $name;
public $country;
public $flag;
public $numberOfTitles;
public $coach;
public $coachPicture;
public $picturePath;
public $homeDress;
public $awayDress;


public function __construct($id,$name,$country,$flag,$coach,$coachPicture,$numberOfTitles,$homeDress,$awayDress){
    $this->id = $id;
    $this->name = $name;
    $this->country = $country;
    $this->flag = $flag;
    $this->coach=$coach;
    $this->coachPicture=$coachPicture;
    $this->$numberOfTitles = $numberOfTitles;
    $this->homeDress=$homeDress;
    $this->awayDress=$awayDress;
    
}

public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM team";
        return $conn->query($query);
    }

public static function getById(mysqli $conn, $id)
    {
        $query = "SELECT * FROM team WHERE id=$id";
        return $conn->query($query);
    }

public static function updateTeam(mysqli $conn, $timId, $broj){
  
    $query = "UPDATE team SET numberOfTitles= $broj WHERE id=$timId";
    return $conn->query($query);
}



}
?>  