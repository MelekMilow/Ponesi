<?php
require "baza.php";
require "korisnik/Korisnik.php";


session_start();

if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ponesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Početna strana</h1>
    </div>

    <div class="navigacija d-flex">
        <ul class="nav">
            <li class="nav-link">
                <p>User: <?=$_SESSION['current_user']?></p>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pocetna.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="izmenaNaloga.php">Izmeni nalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="odjava.php">Odjavi se</a>
            </li>
        </ul>

    </div>
</div>

<div class="sadrzaj">


    <div class="restorani">



    </div>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/pocetna.js"></script>
</body>
</html>