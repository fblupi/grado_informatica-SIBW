function slide(clase, id, tiempoTrans) {
    //En el css la clase 'clase' debe aparecer como display none. El id 'id' es el que marca qué imagen del slider es la que se muestra que puede tener cualquier estilo. En el html, la primera imagen debe ser la que tenga el id que indica que está activo.
    
    var imagenes = document.getElementsByClassName(clase),
        cont = 0,
        tama = imagenes.length;
    
    setInterval(function () {
        imagenes[cont].removeAttribute('id');
        cont = (cont + 1) % tama;
        imagenes[cont].setAttribute('id', id);
        
    }, tiempoTrans);
}

function validar(nombreFormulario) {
    var formulario = document.forms[nombreFormulario],
        validado = true,
        elemento,
        regExp,
        i;
    
    for (i = 0; i < formulario.elements.length; i += 1) {
        elemento = formulario.elements[i];
        
        if (elemento.type === "text" || elemento.type === "textarea") { // Elemento de texto o área de texto
            if (elemento.value === "") { // Campo vacío
                elemento.setAttribute("class", "error");
                validado = false;
            } else {
                elemento.setAttribute("class", "valido");
            }
            
            if (elemento.name === "telefono") { // Campo telefónico
                regExp = /([0-9]{9})/;
                if (!elemento.value.match(regExp)) { // Teléfono incorrecto
                    elemento.setAttribute("class", "error");
                    validado = false;
                } else {
                    elemento.setAttribute("class", "valido");
                }
            }
        }
        
        if (elemento.type === "email") { // Campo de email
            regExp = /([a-z\-_0-9]+@[a-z\-]*\.?[a-z]+\.[a-z\-]+)/;
            if (!elemento.value.match(regExp)) { // email incorrecto
                elemento.setAttribute("class", "error");
                validado = false;
            } else {
                elemento.setAttribute("class", "valido");
            }
        }
        
    }
    
    return validado;
}

function comprobarEmail (input) {
    if (input.value != document.getElementById('emailForm').value) {
        input.setCustomValidity('Los dos email deben coincidir.');
    } else {
        input.setCustomValidity('');
   }
}

function comprobarContrasena (input) {
    if (input.value != document.getElementById('contrasenaForm').value) {
        input.setCustomValidity('Las dos contraseñas deben coincidir.');
    } else {
        input.setCustomValidity('');
   }
}

function actualizarActividades (select) {
    var input = document.getElementById ("cena-gala");

    if (select.value=="Profesor") {
        input.disabled = true;
        input.checked = true;
    } else {
        input.disabled = false;
        input.checked = false;
    }
}

function fechasValidas () {
    var fechaLlegada = document.getElementById('fechaLlegada'),
        fechaSalida = document.getElementById('fechaSalida'),
        validado = true;
    
    if (fechaLlegada.value >= fechaSalida.value) {
        validado = false;
        alert("Las fechas no son correctas");
    }
    
    return validado;
}

function validaHoteles(){
    var hoteles = document.getElementsByClassName("hotelCheck");
    var cont=0;

    var hotel;

    for(var i=0;i<hoteles.length;i++){
        if(hoteles[i].checked){
            cont++;
        }

    }

    var valido=true;

    if(cont<1){
        alert("Debe seleccionar un hotel");
        valido=false;
    }else if(cont>1){
        alert("Debe selecioccionar solo un hotel");
        valido=false;
    }

    //Comprobamos las habitaciones
    var habitaciones = document.getElementsByClassName("habitacionesSelect");
    cont=0;
    
    for(i=0;i<habitaciones.length;i++){
        var habitacion = habitaciones[i];
        if(habitacion.options[habitacion.selectedIndex].value !== "NO"){
            cont++;
        }
    }

    if(cont<1){
        alert("Debe seleccionar una habitación");
        valido=false;
    }else if(cont>1){
        alert("Debe selecioccionar solo una habitación");
        valido=false;
    }


    return valido;
}