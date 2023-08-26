<?php

class MatchGame
{
    private $conn;

    private $id;
    private $home;
    private $guest;
    private $date;
    private $time;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     * @return Match
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Match
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * @param mixed $home
     * @return Match
     */
    public function setHome($home)
    {
        $this->home = $home;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param mixed $guest
     * @return Match
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Match
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     * @return Match
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }


    function pretrazi(mysqli $conn, $home, $guest, $sortiranje){
        $query = "SELECT fm.id, fm.date, fm.time, t1.name as domacin, t1.picturePath as domacinSlika,t2.name as gost, t2.picturePath as gostSlika  FROM footballmatch fm JOIN team t1 ON fm.home = t1.id JOIN team t2 ON fm.guest = t2.id WHERE (fm.home = $home OR fm.guest = $home)";

        if($guest != 0){
            $query .= " AND (fm.guest = $guest OR fm.home = $guest )";
        }

        $query .= " ORDER BY fm.date $sortiranje";

        return $this->conn->query($query);
    }

    public function delete($id)
    {
        $query = "DELETE FROM footballmatch WHERE id= $id";

        return $this->conn->query($query);
    }


    public function dodaj($domacin, $gost, $datum, $vreme)
    {
        $query = "INSERT INTO footballmatch VALUES (null, $domacin, $gost, '$datum', '$vreme')";

        return $this->conn->query($query);
    }

}