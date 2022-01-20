function poruci(id){
    req=$.ajax({
        url:'hrana/get.php',
        method:'post',
        data:{'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        let odg = $.parseJSON(res)[0];
        console.log(odg)
        alert("Uspesno ste porucili "+odg.naziv)
    })
}