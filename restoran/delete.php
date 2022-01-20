<?php

require "../baza.php";
require "Restoran.php";

if(isset($_POST['id'])){

    $restoran = new Restoran($_POST['id'],null,null,null,null);

    $status = $restoran->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>