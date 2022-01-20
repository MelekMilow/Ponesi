<?php

require "../baza.php";
require "Hrana.php";

if(isset($_POST['id'])){

    $hrana = new Hrana($_POST['id'],null,null,null,null);

    $status = $hrana->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>