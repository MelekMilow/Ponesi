<?php
require "../baza.php";
require "Hrana.php";

if(isset($_POST['id'])){

    $obj = Hrana::getAllHranaRestoran($conn,$_POST['id']);

    echo json_encode($obj);

}

?>