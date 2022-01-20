<?php

class Restoran
{

    public $id;
    public $naziv;
    public $adresa;
    public $brojTelefona;
    public $radnoVreme;


    public function __construct($id=null, $naziv=null, $adresa=null, $brojTelefona=null, $radnoVreme=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->adresa = $adresa;
        $this->brojTelefona = $brojTelefona;
        $this->radnoVreme = $radnoVreme;
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO restoran (naziv,adresa,brojTelefona,radnoVreme) 
                 VALUES ('$this->naziv','$this->adresa','$this->brojTelefona','$this->radnoVreme');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE restoran set naziv = '$this->naziv',adresa = '$this->adresa',
                   brojTelefona = '$this->brojTelefona',radnoVreme = '$this->radnoVreme' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM restoran WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM restoran";
        return $conn->query($upit);
    }


    public static function getRestoran($id, mysqli $conn){
        $upit = "SELECT * FROM restoran WHERE id=$id";

        $restoran = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $restoran[]= $red;
            }
        }

        return $restoran;
    }

}