<aside>
    <?php
        $categoria=isset($_GET['cat']) ? $_GET['cat'] : '';
        $poncat=isset($_GET['poncat']) ? $_GET['poncat'] : '';
        $ponencia=isset($_GET['pon']) ? $_GET['pon'] : '';

        if($categoria=='programa' && $ponencia!=''){            
            include 'contenido/contexmenu.php';
        }
    ?>
    <div id="fechas">
        <h1>Fechas importantes</h1>
        <ul>
            <li><b>Fin de Inscripción:</b> 15 de Mayo</li> 
            <li><b>Inicio del Congreso:</b> 1 de Junio</li>
        </ul>
    </div>
    <div id="redes-sociales">
        <h1>Redes Sociales</h1>
        <a id="btn-twitter" href="https://twitter.com/ceiieetsiit"target="_blank"><i class="fa fa-twitter-square"></i></a>
        <a id="btn-facebook" href="https://www.facebook.com/profile.php?id=100009301161353"target="_blank"><i class="fa fa-facebook-square"></i></a>
        <a id="btn-google" href="https://plus.google.com/u/0/118284246531701184750"target="_blank"><i class="fa fa-google-plus-square"></i></a>
    </div>
    <div id="enlaces">
        <h1>Enlaces Rápidos</h1>
        <ul>
            <li><a href="http://www.ugr.es/" target="_blank">Universidad de Granada</a></li>
            <li><a href="http://etsiit.ugr.es/" target="_blank">Escuela Técnica Superior de Ingnierías Informática y Telecomunicación</a></li>
        </ul>
    </div>                
    <div id="patrocinadores">
        <h1>Patrocinadores</h1>
        <ul class="slider-patro">
            <li><img class="slider-patrocinador" id="active-slider-patrocinador" title="LogoDGE" alt="LogoDGE" src="images/patrocinadores/LogoDGE.jpg"/></li>
            <li><img class="slider-patrocinador" title="LogoETSIIT" alt="LogoEtsiit" src="images/patrocinadores/LogoETSIIT.jpg"/></li>
            <li><img class="slider-patrocinador" title="LogoGitHub" alt="LogoGitHub" src="images/patrocinadores/LogoGitHub.jpg"/></li>
            <li><img class="slider-patrocinador"  title="LogoSpiral" alt="LogoSpiral" src="images/patrocinadores/LogoSpiral.jpg"/></li>
        </ul>
        <script type="text/javascript">
            slide('slider-patrocinador','active-slider-patrocinador',4000);
        </script>
    </div>
</aside>