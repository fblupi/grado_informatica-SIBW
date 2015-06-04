function objetoAjax () {

    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function actualizarActividades () {
    var divResultado = document.getElementById("actividadesIns"),
        cuota = document.getElementById("cuota").value;

    var ajax = objetoAjax();

    ajax.open("GET", "ajax/actualizarActividades.php?cuota="+cuota, true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.send(null);
}

function buscarCongresistas () {
    var divResultado = document.getElementById('congresistas'),
        nombre = document.getElementById('nombre').value,
        apellidos = document.getElementById('apellidos').value,
        email = document.getElementById('email').value,
        telefono = document.getElementById('telefono').value,
        centro = document.getElementById('centro').value,
        cuota = document.getElementById('cuota').value;
    
    var ajax = objetoAjax();
    
    ajax.open("GET", "ajax/buscarCongresistas.php?nombre="+nombre+"&apellidos="+apellidos+"&email="+email+"&telefono="+telefono+"&centro="+centro+"&cuota="+cuota, true);
    
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.send(null);
}