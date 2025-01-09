function headersearch() {

    var input = document.getElementById("hedreinput");
    var icon = document.getElementById("icon");
    var icon2 = document.getElementById("icon2");
    // alert('fjkh');


    icon.style.display = 'none';
    input.style.display = 'block';
    icon2.style.display = 'block';
    input.style.width = "80%"
    input.style.transitionDuration = 10;
    // input.classList.remove('hedreinput1');
    // input.classList.add('hedreinput2');

}


function navigation() {
    var navidiv1 = document.getElementById("navidiv1");
    navidiv1.classList.remove('hederDiv2');
    navidiv1.classList.remove('hederDiv222');
    navidiv1.classList.add('hederDiv22');

    document.getElementById("home").style.fontSize = "20px";
    document.getElementById("recod").style.fontSize = "20px";




}

function navigation2() {
    var navidiv1 = document.getElementById("navidiv1");
    navidiv1.classList.remove('hederDiv2');
    navidiv1.classList.remove('hederDiv22');

    navidiv1.classList.add('hederDiv222');

    document.getElementById("home").style.fontSize = "15px";
    document.getElementById("recod").style.fontSize = "15px";



}