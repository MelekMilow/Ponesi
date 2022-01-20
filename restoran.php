<?php
require "baza.php";
require "korisnik/Korisnik.php";
require "restoran/Restoran.php";
require "hrana/Hrana.php";


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
    <?php
    $restoran = Restoran::getRestoran($_GET['restoran_id'],$conn)[0];

    ?>
    <div class="naslov">
        <h1>Restoran</h1>
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
                <a class="nav-link" href="nalog.php">Izmeni nalog</a>
            </li>
            <?php
            if($_SESSION['current_user']=='admin'){
                echo' 
                <li class="nav-item">
                    <a class="nav-link" href="dodavanje.php">Dodaj restoran/hranu</a>
                </li>';
            }
            ?>

            <li class="nav-item">
                <a class="nav-link" href="odjava.php">Odjavi se</a>
            </li>
        </ul>

    </div>
</div>

<div class="sadrzaj">

    <h2><?=$restoran['naziv']?></h2>

    <div class="restorani row row-cols-1 row-cols-sm-2 g-3">

        <?php
        $jelovnik=Hrana::getAllHranaRestoran($conn,$restoran['id']);

        foreach ($jelovnik as $hrana){?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?=$hrana['naziv']?></h5>
                        <p class="card-text"><?=$hrana['opis']?></p>
                        <p class="card-text"><?=$hrana['cena']?></p>
                        <button type="button" class="btn btn-success" onclick="poruci(<?=$hrana['id']?>)">Poruci</button>
                    </div>
                </div>
            </div>
        <?php     }
        ?>

    </div>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/restoran.js"></script>
</body>
</html>
