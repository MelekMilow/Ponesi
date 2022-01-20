$('#pretraga').on("keyup", function() {
    let unos = $(this).val();
    let filter = unos.toLowerCase();
    let restorani = $(".restorani")[0].getElementsByTagName("form");

    for(let i=0;i<restorani.length;i++){

        let vidljiv=false;


        let naslov = restorani[i].getElementsByTagName("h5")[0];

        if (naslov) {
            unos = naslov.textContent || naslov.innerText;
            if (unos.toLowerCase().indexOf(filter) > -1) {
                vidljiv=true;
            }
        }

        if(vidljiv){
            restorani[i].style.display = "";
        }else{
            restorani[i].style.display = "none";
        }
    }
})

$('#sortBtn').click(function (){

    let sortirano = false;

    while (!sortirano) {
        sortirano = true;
        let restorani = document.getElementsByClassName("kartice");
        let zaZamenu;
        let i
        for (i = 0; i < restorani.length-1; i++) {
            zaZamenu = false;
            let el1 = restorani[i].getElementsByTagName("h5")[0];
            let el2 = restorani[i + 1].getElementsByTagName("h5")[0];
            if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                zaZamenu = true;
                break;
            }
        }
        if (zaZamenu) {
            restorani[i].parentNode.insertBefore(restorani[i + 1], restorani[i]);
            sortirano = false;
        }
    }
});