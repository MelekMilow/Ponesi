<?php

$host = "localhost";
$db = "porucivanje_hrane";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db);


if ($conn->connect_errno){
    exit("Konekcija neuspela: greska> ".$conn->connect_error.", kod greske>".$conn->connect_errno);
}

?>