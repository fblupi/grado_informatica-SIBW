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
                $altTitle;
                switch($actividad){
                    case 'alhambra':
                        $altTitle='Alhambra'; //Valor que tendra alt y tittle de las iamgenes
                        $desp=0;
                        break;
                    case 'sierra-nevada':
                        $altTitle='Sierra Nevada';
                        $desp=7;
                        break;
                    default:
                        $desp=0;
                }

                $archivo=file_get_contents("contenido/actividades/actividades.txt");
                $archivo=utf8_encode($archivo);
                $seccion = explode(";", $archivo); //Las secciones son separadas por ;                
                $codigo = explode('=',$seccion[0+$desp]); //Seccion 0 tiene código
                $titulo=explode('=',$seccion[1+$desp]); //Seccion 1 tiene título

                echo '<h1>'.$titulo[1].'</h1>';
                $imagen=explode('=',$seccion[2+$desp]); //Seccion 2 
                $i;
                echo '<div id="contenedor-slider-actividad">
                    <ul class="slider">';
                $srcImg=explode('*',$imagen[1]);                    
                echo '<li><img class="slider-actividad" id="active-slider-actividad" title="'.$altTitle.'" alt="'.$altTitle.'" src="images/actividades/'.$srcImg[0].'"></li>';                                     

                $parte1Img='<li><img class="slider-actividad" title="'.$altTitle.'" alt="'.$altTitle.'" src="images/actividades/'; //La primera parte de la imagen es distinta dependiendo de la imagen porque varía el alt y tittle.

                inserta_lista($parte1Img,'"></li>
                ',$seccion,2+$desp,2,'*');
                
                echo '</ul>                                                    
                </div>
                <script type="text/javascript">
                    slide("slider-actividad","active-slider-actividad",4000);
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
            <p class="go-back"><a href="index.php?cat=actividades">Volver a actividades</a></p>
        </article>
    </section>
</div> <!-- end content -->