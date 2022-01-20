<?php

require "../baza.php";
require "Restoran.php";

if(isset($_POST['naziv']) &&
    isset($_POST['adresa']) &&
    isset($_POST['brojTelefona']) &&
    isset($_POST['radnoVreme'])){

    $restoran = new Restoran(null,$_POST['naziv'],$_POST['adresa'],
        $_POST['brojTelefona'],$_POST['radnoVreme']);

    $status = $restoran->add($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>