var contImagenPatro=0;
var nPatrocinadores=4;

function sliderAsidePatro() {
    var objetoImagen = document.getElementById("imagen-patrocinador");
    switch(contImagenPatro%nPatrocinadores){
        case 0:
            objetoImagen.alt="logoETSIIT";
            objetoImagen.src="images/patrocinadores/LogoETSIIT.jpg";
            break;
        case 1:
            objetoImagen.alt="LogoGitHub";
            objetoImagen.src="images/patrocinadores/LogoGitHub.jpg";
            break;
        case 2:
            objetoImagen.alt="LogoSpiral";
            objetoImagen.src="images/patrocinadores/LogoSpiral.jpg";
            break;
        case 3:
            objetoImagen.alt="LogoDGE";
            objetoImagen.src="images/patrocinadores/LogoDGE.jpg";
            break;
        default:
            objetoImagen.alt="logoETSIIT";
            objetoImagen.src="images/patrocinadores/LogoETSIIT.jpg";
            break;            
    }
    
    contImagenPatro++;
 } 