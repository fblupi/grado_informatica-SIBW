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