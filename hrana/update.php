<?php

require "../baza.php";
require "Hrana.php";

if( isset($_POST['id']) &&
    isset($_POST['restoran_id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['opis']) &&
    isset($_POST['cena'])){

    $hrana = new Hrana($_POST['id'],$_POST['restoran_id'],$_POST['naziv'],
                             $_POST['opis'],$_POST['cena']);

    $status = $hrana->update($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>