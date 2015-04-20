<div id="content">
    <section>
        <article>
            <?php
                
                function inserta_lista($comienzo,$fin,$secciones,$nSec,$comSec,$simExp){
                    $i;
                    $sec=explode('=',$secciones[$nSec]);                    
                    for($i=$comSec;$i<count($sec);$i=$i+1){                        
                        $aux=explode($simExp,$sec[$i]);
                        echo $comienzo.$aux[0].$fin;
                    }
                }
                $desp;
                switch($actividad){
                    case 'alhambra':
                        $desp=0;
                        break;
                    case 'sierra-nevada':
                        $desp=7;
                        break;
                    default:
                        $desp=0;
                }

                $archivo=file_get_contents("contenido/actividades/actividades.txt");                
                $seccion = explode(";", $archivo); //Las secciones son separadas por ;                
                $codigo = explode('=',$seccion[0+$desp]); //Seccion 0 tiene código
                $titulo=explode('=',$seccion[1+$desp]); //Seccion 1 tiene título

                echo '<h1>'.$titulo[1].'</h1>';
                $imagen=explode('=',$seccion[2+$desp]); //Seccion 2 
                $i;
                echo '<div id="contenedor-slider-actividad">
                    <ul class="slider">';
                $srcImg=explode('*',$imagen[1]);                    
        echo '<li><img class="slider-actividad" id="active-slider-actividad" title="Alhambra" alt="alhambra" src="images/actividades/'.$srcImg[0].'"></li>';                                     inserta_lista('<li><img class="slider-actividad" title="Alhambra" alt="alhambra" src="images/actividades/','"></li>
        ',$seccion,2+$desp,2,'*');
                /*
                for($i=2;$i<count($imagen);$i=$i+1){      
                    $srcImg=explode('*',$imagen[$i]); 
                    echo '<li><img class="slider-actividad" title="Alhambra" alt="alhambra" src="images/actividades/'.$srcImg[0].'"></li>
                    ';                        
                }*/
                echo '</ul>                                                    
                </div>
                <script type="text/javascript">
                    slide("slider-actividad","active-slider-actividad",2000);
                </script>
                <h2>Descripción</h2>
                ';
                inserta_lista('<p>','</p>',$seccion,3+$desp,1,'*');
                /*
                $descripcion=explode('=',$seccion[3]);                    
                $parrafo=explode('*',$descripcion[1]);
                for($i=0;$i<count($parrafo);$i=$i+1){
                    echo '<p>'.$parrafo[$i].'</p>';
                }*/

                echo '<h2> Detalles </h2>
                <ul>';
                inserta_lista('<li>','</li>',$seccion,4+$desp,1,'*');
                /*
                $detalles=explode('=',$seccion[4]);
                for($i=1;$i<count($detalles);$i=$i+1){
                    $detalle=explode('*',$detalles[$i]);
                    echo '<li>'.$detalle[0].'</li>
                    ';
                }
                */
                echo '</ul>
                        <h2>Fecha</h2>
                <ul>
                ';
                inserta_lista('<li>','</li>',$seccion,5+$desp,1,'*');
                echo '</ul>
        <h2>Precio</h2>';

                inserta_lista('<p>','</p>',$seccion,6+$desp,1,'*');
                        
                
                
            ?> 
            <p class="go-back"><a href="actividades.html">Volver a actividades</a></p>
        </article>
    </section>
</div> <!-- end content -->