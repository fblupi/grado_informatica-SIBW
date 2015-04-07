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
                //alert("Debe rellenar el campo: " + elemento.name);
                elemento.setAttribute("class", "error");
                validado = false;
            } else {
                elemento.setAttribute("class", "valido");
            }
            
            if (elemento.name === "telefono") { // Campo telefónico
                regExp = /([0-9]{9})/;
                if (!elemento.value.match(regExp)) { // Teléfono incorrecto
                    //alert("Introduzca un telefono valido.");
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
                //alert("Introduzca un email valido.");
                elemento.setAttribute("class", "error");
                validado = false;
            } else {
                elemento.setAttribute("class", "valido");
            }
        }
        
    }
    
    if (validado) {
        alert("El formulario se ha enviado correctamente");
        validado = false; // Se pone el valor a false par que no salga mensaje de error al no tener script de envío
        
    }
    
    return validado;
}