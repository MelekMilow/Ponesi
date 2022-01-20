<?php

class Hrana
{
    public $id;
    public $restoran_id;
    public $naziv;
    public $opis;
    public $cena;


    public function __construct($id=null, $restoran_id=null, $naziv=null, $opis=null, $cena=null)
    {
        $this->id = $id;
        $this->restoran_id = $restoran_id;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->cena = $cena;
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO hrana (restoran_id,naziv,opis,cena) 
                 VALUES ('$this->restoran_id','$this->naziv','$this->opis','$this->cena';";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE hrana set restoran_id = '$this->restoran_id',naziv = '$this->naziv',
                   opis = '$this->opis',cena = '$this->cena' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM hrana WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM hrana";
        return $conn->query($upit);
    }


    public static function getHrana($id, mysqli $conn){
        $upit = "SELECT * FROM restoran_id WHERE id=$id";

        $hrana = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $hrana[]= $red;
            }
        }

        return $hrana;
    }

}