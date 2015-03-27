function slide(clase,id,tiempoTrans){
    //En el css la clase 'clase' debe aparecer como display none. El id 'id' es el que marca qué imagen del slider es la que se muestra que puede tener cualquier estilo. En el html, la primera imagen debe ser la que tenga el id que indica que está activo.
    
    var imagenes =          document.getElementsByClassName(clase);
    var cont=0;
    var tama=imagenes.length;    
    
    setInterval(function(){        
        imagenes[cont].removeAttribute('id');
        cont=(cont+1)%tama;
        imagenes[cont].setAttribute('id',id);
        
    },tiempoTrans);
    
}

function validar(nombreFormulario){
    var formulario = document.forms[nombreFormulario];
    var validado= true;
    
    for(var i=0; i<formulario.elements.length; i++){
        var elemento = formulario.elements[i];
        
        if(elemento.type==="text" || elemento.type==="textarea" ){            
            if(elemento.value===""){
                alert("Debe rellenar el campo: " + elemento.name);
                validado=false;
            }else if(elemento.name==="telefono"){                
                var regExp = /([0-9]{9})/; 
                if(!elemento.value.match(regExp)){
                    alert("Introduzca un telefono valido.");
                    validado=false;
                }
            }
        }
        if(elemento.type==="email"){
            var regExp = /([a-z\-_0-9]+@[a-z\-]*\.?[a-z]+\.[a-z\-]+)/; 
            if(!elemento.value.match(regExp)){
                alert("Introduzca un email valido.");
                validado=false;
            }            
        }
        
    }
    
    if(validado){
        alert('El formulario se ha enviado correctamente');
        validado=false; /* Se pone el valor a false par que no salga mensaje de error al no tener script de envio */
        
    }
    return validado;
}

