function popuniFormu(){
    let selectBox = document.getElementById('idRestoranSelect');
    let vrednost = selectBox.options[selectBox.selectedIndex].value;
    document.getElementById('idRestoran').value=vrednost;
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
});

$('#formaRestoran').submit(function(){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
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