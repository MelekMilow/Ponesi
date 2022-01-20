<?php

require "../baza.php";
require "Restoran.php";

if( isset($_POST['id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['adresa']) &&
    isset($_POST['brojTelefona']) &&
    isset($_POST['radnoVreme'])){

    $restoran = new Restoran($_POST['id'],$_POST['naziv'],$_POST['adresa'],
                             $_POST['brojTelefona'],$_POST['radnoVreme']);

    $status = $restoran->update($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>