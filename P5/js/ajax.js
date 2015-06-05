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

function cambiarActividades(){
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

function cambiarPrecioCuota(){
    var spanPrecio = document.getElementById('precio'),
        cuota = document.getElementById("cuota").value;

    var ajax = objetoAjax();

    ajax.open("GET", "ajax/obtenerPrecioCuota.php?cuota="+cuota, true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            spanPrecio.innerHTML = ajax.responseText;
        }
    };
    ajax.send(null);

}


function actualizarActividades () {
    cambiarActividades();
    cambiarPrecioCuota();

}


function cambiarPrecio(actividad,accion){
    var spanPrecio = document.getElementById('precio');
    var idActividad = actividad;

    var ajax = objetoAjax();

    ajax.open("GET", "ajax/obtenerPrecioActividad.php?actividad="+idActividad, true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            if(accion=="sumar"){
                spanPrecio.innerHTML = parseInt(spanPrecio.innerHTML)+parseInt(ajax.responseText);
            }else{
                spanPrecio.innerHTML = parseInt(spanPrecio.innerHTML)-parseInt(ajax.responseText);
            }

        }
    };
    ajax.send(null);
}

function cambiarImagen(actividad){
    var divResultado = document.getElementById('divpic-' + actividad);


    if (divResultado.innerHTML != "") { // Div no vacío
        divResultado.innerHTML = "";
    } else {
        var ajax = objetoAjax();

        ajax.open("GET", "ajax/actualizarFoto.php?actividad="+actividad, true);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {
                divResultado.innerHTML = ajax.responseText;
            }
        };
        ajax.send(null);
    }
}

function actualizarFoto (inputActividad) {
    var actividad=inputActividad.value;
    var accion;
    if(inputActividad.checked){
        accion="sumar";
    }else{
        accion="restar";
    }
    cambiarImagen(actividad);
    cambiarPrecio(actividad,accion);
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