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
    var spanPrecioCuota = document.getElementById('precioCuota'),
        cuota = document.getElementById("cuota").value;

    var ajax = objetoAjax();

    ajax.open("GET", "ajax/obtenerPrecioCuota.php?cuota="+cuota, false);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            spanPrecioCuota.innerHTML = ajax.responseText;
        }
    };
    ajax.send(null);

    actualizarPrecioTotal();

}


function actualizarActividades () {
    cambiarActividades();
    cambiarPrecioCuota();

}


function cambiarPrecio(actividad,accion){
    var spanPrecioActividades = document.getElementById('precioActividades');
    var idActividad = actividad;

    var ajax = objetoAjax();

    ajax.open("GET", "ajax/obtenerPrecioActividad.php?actividad="+idActividad, false);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {
            if(accion=="sumar"){
                spanPrecioActividades.innerHTML = parseInt(spanPrecioActividades.innerHTML)+parseInt(ajax.responseText);
            }else{
                spanPrecioActividades.innerHTML = parseInt(spanPrecioActividades.innerHTML)-parseInt(ajax.responseText);
            }

        }
    };
    ajax.send(null);

    actualizarPrecioTotal();
}

function cambiarImagen(actividad){
    var divResultado = document.getElementById('divpic-' + actividad);


    if (divResultado.innerHTML != "") { // Div no vacío
        divResultado.innerHTML = "";
    } else {
        var ajax = objetoAjax();

        ajax.open("GET", "ajax/actualizarFoto.php?actividad="+actividad, false);

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

function cambiarPrecioHabitacion(selectHabitacion){
    var spanPrecioHotel = document.getElementById('precioHotel');
    var habitacion=selectHabitacion.value;

    if(selectHabitacion.value!=="NO"){
        var ajax = objetoAjax();

        ajax.open("GET", "ajax/obtenerPrecioHabitacion.php?habitacion="+habitacion, false);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {
                spanPrecioHotel.innerHTML = ajax.responseText;
            }
        };
        ajax.send(null);
    }else{
        spanPrecioHotel.innerHTML="No se ha reservado ningún hotel";
    }
    actualizarPrecioTotal();
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