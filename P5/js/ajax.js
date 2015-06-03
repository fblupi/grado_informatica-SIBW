function objetoAjax(){

    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function actualizarActividades(){
    divResultado = document.getElementById("actividadesIns");
    cuota = document.getElementById("cuota").value;

    ajax = objetoAjax();

    ajax.open("GET","ajax/actualizarActividades.php?cuota="+cuota,true);

    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);

}