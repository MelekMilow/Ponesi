<?php

require "../baza.php";
require "Hrana.php";

if(isset($_POST['restoran_id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['opis']) &&
    isset($_POST['cena'])){

    $hrana = new Hrana(null,$_POST['restoran_id'],$_POST['naziv'],
        $_POST['opis'],$_POST['cena']);

    $status = $hrana->add($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>