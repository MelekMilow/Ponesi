<?php
require "baza.php";
require "korisnik/Korisnik.php";
require "restoran/Restoran.php";


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

    <div class="d-flex justify-content-center">
        <div class=" w-100 p-3">
            <input class="form-control" type="text" placeholder="pretraga" id="pretraga">
        </div>
        <div class=" w-50 p-3">
            <input class="btn btn-primary" type="button" id="sortBtn" value="sortiraj">
        </div>
    </div>
    <div class="restorani row row-cols-1 row-cols-sm-2 g-3">

        <?php
            $restorani=Restoran::getAll($conn);
            while (($restoran=$restorani->fetch_assoc())!=null){?>
                <form class="kartice" action="restoran.php" method="get" class="col">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"><?=$restoran['naziv']?></h5>
                                <p class="card-text"><?=$restoran['adresa']?></p>
                                <p class="card-text"><?=$restoran['brojTelefona']?></p>
                                <p class="card-text"><?=$restoran['radnoVreme']?></p>
                             <input type="hidden" name="restoran_id" value="<?=$restoran['id']?>">
                             <button type="submit" class="btn btn-success">Pogledaj restoran</button>
                          </div>
                     </div>
                </form>
       <?php }?>

    </div>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/pretragaSortiranje.js"></script>
</body>
</html>
