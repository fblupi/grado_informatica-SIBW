<div id="content">
    <section>
        <article>
            <?php
            if($_SESSION['privilegio']==1) {
                echo '<h1>Panel de control de administrador</h1>';
                echo '<a href="index.php?cat=ver-congresistas">Ver congresistas </a>';
                echo '<h2>Editar cuotas</h2>';
                include 'comun/conexionDB.php';
                $resultado=mysql_query("SELECT ID_cuota,Nombre_cuota FROM cuotas ");

                echo '<ul>';
                while($fila=mysql_fetch_array($resultado)){
                    echo '<li><a href="index.php?cat=editar-cuota&cuota='.$fila['ID_cuota'].'">'.$fila['Nombre_cuota'].'</a></li>';
                }
                echo '</ul>';

                echo '<h2>Editar actividades</h2>';
                $resultado=mysql_query("SELECT ID_act,Titulo FROM actividades ");
                echo '<ul>';
                while($fila=mysql_fetch_array($resultado))
                    echo '<li><a href="index.php?cat=editar-act&act='.$fila['ID_act'].'">'.$fila['Titulo'].'</a></li>';
                echo '</ul>';

                mysql_close($conexion);

            }?>
        </article>
    </section>
</div> <!-- end content -->