var contImagenPatro=0;
var nPatrocinadores=4;

function sliderAsidePatro() {
    var objetoImagen = document.getElementById("imagen-patrocinador");
    switch(contImagenPatro%nPatrocinadores){
        case 0:
            objetoImagen.alt="LogoETSIIT";
            objetoImagen.title="LogoETSIIT";
            objetoImagen.src="images/patrocinadores/LogoETSIIT.jpg";
            break;
        case 1:
            objetoImagen.alt="LogoGitHub";
            objetoImagen.title="LogoGitHub";
            objetoImagen.src="images/patrocinadores/LogoGitHub.jpg";
            break;
        case 2:
            objetoImagen.alt="LogoSpiral";
            objetoImagen.title="LogoSpiral";
            objetoImagen.src="images/patrocinadores/LogoSpiral.jpg";
            break;
        case 3:
            objetoImagen.alt="LogoDGE";
            objetoImagen.title="LogoDGE";
            objetoImagen.src="images/patrocinadores/LogoDGE.jpg";
            break;
        default:
            objetoImagen.alt="LogoETSIIT";
            objetoImagen.title="LogoETSIIT";
            objetoImagen.src="images/patrocinadores/LogoETSIIT.jpg";
            break;            
    }
    
    contImagenPatro++;
 } 

function isEmpty(campo){
    if(campo.value===""){
        return true;
    }else{
       return false; 
    }
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

