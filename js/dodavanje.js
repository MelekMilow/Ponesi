function popuniFormu(){
    let selectBox = document.getElementById('idRestoranSelect');
    let vrednost = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById('formaHrana').reset();
    document.getElementById('idRestoran').value=vrednost;
    document.getElementById('idRestoranHrana').value=vrednost;
    if(vrednost===""){
        document.getElementById('formaRestoran').reset();
        $('#idRestoran').val("");
        return;
    }

    console.log(document.getElementById('idRestoran').value);

    req=$.ajax({
        url:'restoran/get.php',
        method:'post',
        data:{'id':vrednost}
    });

    req.done(function(res,textStatus,jqXHR){
      let odg = $.parseJSON(res)[0];
      console.log(odg)
        $('#idRestoran').val(odg.id);
        $('#idNazivRestorana').val(odg.naziv);
        $('#idAdresaRestorana').val(odg.adresa);
        $('#idBrojTelefonaRestorana').val(odg.brojTelefona);
        $('#idRadnoVremeRestorana').val(odg.radnoVreme);
    })

    $('#idHranaSelect').find('option').remove().end();

    req=$.ajax({
        url:'hrana/getHranaRestorana.php',
        method:'post',
        data:{'id':vrednost}
    });

    req.done(function(res,textStatus,jqXHR){
    let odg = $.parseJSON(res);
        $('#idHranaSelect').append(`<option value=""></option>`);
        for(let i=0;i<odg.length;i++){
            console.log(odg[i]);
            $('#idHranaSelect').append(`<option value="${odg[i].id}">
                                       ${odg[i].naziv}
                                  </option>`);
        }
    })
}

$('#resetForme').click(function (){
    $('#idRestoran').val("");
    $('#idHrana').val("");
    $('#idRestoranHrana').val("");
    document.getElementById('formaHrana').reset();

});
$('#resetFormeHrana').click(function (){
    $('#idHrana').val("");
});

$('#formaRestoran').submit(function(){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('#idRestoran').val()==""){
        req=$.ajax({
            url: 'restoran/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'restoran/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan restoran");
            location.reload();
        }else{
            alert("Neuspešno sačuvan restoran")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});

$('#obrisi').click(function(e){
    e.preventDefault();

    if($('#idRestoran').val()===null ||$('#idRestoran').val()===""){
        alert('Restoran nije odabran!');
        return;
    }


    req=$.ajax({
        url: 'restoran/delete.php',
        type:'post',
        data: {'id':$('#idRestoran').val()}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan restoran!");
            location.reload();
        }else{
            alert("Neuspešno obrisan restoran!")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

function popuniFormuHrana(){
    let selectBox = document.getElementById('idHranaSelect');
    let vrednost = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById('idHrana').value=vrednost;
    if(vrednost===""){
        document.getElementById('formaHrana').reset();
        $('#idHrana').val("");
        return;
    }

    req=$.ajax({
        url:'hrana/get.php',
        method:'post',
        data:{'id':vrednost}
    });

    req.done(function(res,textStatus,jqXHR){
        let odg = $.parseJSON(res)[0];
        console.log(odg)
        $('#idHrana').val(odg.id);
        $('#idNazivHrana').val(odg.naziv);
        $('#idOpisHrana').val(odg.opis);
        $('#idCenaHrana').val(odg.cena);
    });
}

$('#formaHrana').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('#idHrana').val()==""){
        req=$.ajax({
            url: 'hrana/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'hrana/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana hrana");
            location.reload();
        }else{
            alert("Neuspešno sačuvana hrana")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#obrisiHrana').click(function (e){
    e.preventDefault();

    if($('#idHrana').val()===null ||$('#idHrana').val()===""){
        alert('Hrana nije odabrana!');
        return;
    }


    req=$.ajax({
        url: 'hrana/delete.php',
        type:'post',
        data: {'id':$('#idHrana').val()}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana hrana!");
            location.reload();
        }else{
            alert("Neuspešno obrisana hrana!")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});