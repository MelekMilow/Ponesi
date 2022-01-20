<?php
require "baza.php";
require "korisnik/Korisnik.php";
require "restoran/Restoran.php";
require "hrana/Hrana.php";


session_start();

if (!isset($_SESSION['current_user']) || $_SESSION['current_user']!='admin') {
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
        <h1>Restoran i hrana</h1>
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



    <form class="formaRestoran" id="formaRestoran" method="post" >
        <h2>Dodaj restoran</h2>
        <input type="hidden" name="id" id="idRestoran" value="">
        <div class="container">
            <label for="idRestoranSelect" >Restoran</label>
            <select class="form-select" id="idRestoranSelect" onchange="popuniFormu()">
                <option></option>
                <?php
                $restorani=Restoran::getAll($conn);
                while (($restoran=$restorani->fetch_assoc())!=null){?>
                    <option value="<?=$restoran['id']?>"><?=$restoran['naziv']?></option>
                <?php }?>
            </select>
        </div>
        <br>
        <input class="form-control" type="text" id="idNazivRestorana" name="naziv" placeholder="Naziv restorana">
        <br>
        <input class="form-control" type="text" id="idAdresaRestorana" name="adresa" placeholder="Adresa restorana">
        <br>
        <input class="form-control" type="text" id="idBrojTelefonaRestorana" name="brojTelefona" placeholder="Broj telefona">
        <br>
        <textarea class="form-control" id="idRadnoVremeRestorana" name="radnoVreme" placeholder="Radno vreme"></textarea>
        <br>
        <div class="d-grid gap-2 d-md-block container">
            <button type="submit" id="sacuvaj" class="btn btn-success">Sačuvaj</button>
            <button type="reset" id="resetForme" class="btn btn-secondary">Resetuj formu</button>
            <button type="button" id="obrisi" class="btn btn-danger">Obriši</button>
        </div>

    </form>

    <br>
    <br>


    <form class="formaHrana" id="formaHrana" method="post">
        <input type="hidden" name="id" id="idHrana" value="">
        <input type="hidden" name="restoran_id" id="idRestoranHrana" value="">
        <div class="container">
            <label for="idHranaSelect" >Hrana</label>
            <select class="form-select" id="idHranaSelect" onchange="popuniFormuHrana()">
                <option></option>
            </select>
        </div>
        <br>
        <input class="form-control" type="text" id="idNazivHrana" name="naziv" placeholder="Naziv hrane">
        <br>
        <textarea class="form-control" type="text" id="idOpisHrana" name="opis" placeholder="Opis hrane"></textarea>
        <br>
        <input class="form-control" type="text" id="idCenaHrana" name="cena" placeholder="Cena">
        <br>
        <div class="d-grid gap-2 d-md-block container">
            <button type="submit" id="sacuvajHrana" class="btn btn-success">Sačuvaj</button>
            <button type="reset" id="resetFormeHrana" class="btn btn-secondary">Resetuj formu</button>
            <button type="button" id="obrisiHrana" class="btn btn-danger">Obriši</button>
        </div>
    </form>



</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/dodavanje.js"></script>
</body>
</html>
