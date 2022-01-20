<?php

require "../baza.php";
require "Hrana.php";

if(isset($_POST['id'])){

    $obj = Hrana::getHrana($_POST['id'],$conn);

    echo json_encode($obj);

}

?>