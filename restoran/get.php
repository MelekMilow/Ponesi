<?php

require "../baza.php";
require "Restoran.php";

if(isset($_POST['id'])){

    $obj = Restoran::getRestoran($_POST['id'],$conn);

    echo json_encode($obj);

}

?>