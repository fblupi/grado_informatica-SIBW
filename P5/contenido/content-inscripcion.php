<div id="content">
    <section>
        <?php if(isset($_SESSION['usuario'])) {?>
            <p>Debes cerrar sesión para poder inscribirte.</p>
        <?php }else{ ?>

            <?php if(isset($_POST['llegada']) && isset($_POST['salida'])){
                //Esta es la parte donde se muestran los hoteles. Solo se muestran si se ha indicado unas fechas.
                echo '<form class="contact_form" action="contenido/inscripcion/scriptInscripcion.php" onsubmit="return validaHoteles();" method="post" name="inscripcion_form" >';
                echo '<h1>Hoteles</h1>';
                $llegada=$_POST['llegada'];
                $salida=$_POST['salida'];

                echo '<input type="hidden" name="llegada" value="'.$llegada.'"/>';
                echo '<input type="hidden" name="salida" value="'.$salida.'"/>';
                require '/php/apiConnect.php';
                $hoteles = getHoteles();



                echo '<ul>';
                foreach($hoteles as $hotel){
                    echo '<li> <h3>Hotel: '.$hotel[0].'</h3><p>Descripción: '.$hotel[2].'</p></li>';

                    echo '<label for="'.$hotel[1].'">Reservar habitación </label>';
                    echo '<input type="checkbox" class="hotelCheck" name="hotel" id="'.$hotel[1].'" value="'.$hotel[1].'"/>';
                    //Obtenemos las habitaciones disponibles
                    $habitaciones=getHabitaciones($hotel[1],$llegada,$salida);
                    echo '<select class="habitacionesSelect" name="habitaciones[]" required>';
                    echo '<option value="NO"> -- </option>';
                    foreach($habitaciones as $habitacion){
                        echo '<option value="'.$habitacion[0].'">'.$habitacion[1].'('.$habitacion[4].' €)</option>';
                    }
                    echo '</select>';

                }
                echo '</ul>';
            }else{ //El buscado solo se muestra si no hay fechas. El segundo form es por si no se indican fechas, que no haga la validacion de los hoteles.
            ?>
            <form class="contact_form" action="index.php?cat=inscripcion" method="post" name="hoteles_form" onsubmit="return fechasValidas ();">
                <h1>Búsqueda de hoteles</h1>
                <ul>
                    <li>
                        <label for="llegada">Fecha llegada</label>
                        <input id="fechaLlegada" type="date" name="llegada" required/>
                    </li>
                    <li>
                        <label for="salida">Fecha salida</label>
                        <input id="fechaSalida" type="date" name="salida" required/>
                    </li>
                    <li>
                        <button class="submit" type="submit">Buscar hoteles</button>
                    </li>
                </ul>
            </form>

            <form class="contact_form" action="contenido/inscripcion/scriptInscripcion.php" method="post" name="inscripcion_form" >
            <?php } ?>
            <h1>Formulario de Inscripción</h1>
            <ul>
                <li>
                    <label for="name">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Alan" maxlength="20" required/>
                </li>
                <li>
                    <label for="name">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Turing" maxlength="20" required/>
                </li>
                <li>
                    <label for="name">Centro de trabajo:</label>
                    <input type="text" name="centro" placeholder="UGR" maxlength="20"/>
                </li>
                <li>
                    <label for="subject">Teléfono:</label>
                    <input type="tel" pattern="[0-9]{9}" name="telefono" placeholder="612345678" maxlength="12"/>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input id="emailForm" type="email" name="email" placeholder="turing@gmail.com" maxlength="40" required/>
                </li>
                <li>
                    <label for="email">Confirmar email:</label>
                    <input type="email" name="emailConfirm" placeholder="turing@gmail.com" maxlength="40" oninput="comprobarEmail(this)" required/>
                </li>
                
                <li>
                    <label for="contrasena">Contraseña:</label>
                    <input id="contrasenaForm" type="password" name="contrasena" required/>
                </li>
                <li>
                    <label for="contrasena">Confirmar contraseña:</label>
                    <input type="password" name="contrasenaConfirm" oninput="comprobarContrasena(this)" required/>
                </li>
                
                <li>
                    <label for="type">Cuota: </label>
                    <select id="cuota" name="cuota" onchange="actualizarActividades(this)" required>
                        <?php
                            include 'comun/conexionDB.php';
                            $seleccion="SELECT ID_cuota,Nombre_cuota FROM cuotas";
                            $resultado = mysql_query ($seleccion, $conexion);
                            while($fila=mysql_fetch_array($resultado))
                                echo'<option value="'.$fila["ID_cuota"].'">'.$fila["Nombre_cuota"].'</option>';

                        ?>
                    </select>
                </li>
                
                <h2>Actividades</h2>
                <div id="actividadesIns"><li>Seleccionar una cuota</li></div>
                <?php
                    /*
                    include 'comun/conexionDB.php';
                    $seleccion="SELECT ID_act,Titulo FROM actividades";
                    $resultado=mysql_query ($seleccion, $conexion);
                    while($fila=mysql_fetch_array($resultado)) {
                        echo '<li>';
                        echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
                        echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'"/>';
                        echo '</li>';
                    }    
                    */
                ?>
                <div><p>Precio final: <span id="precio">0</span>€</p></div>
                <li>
                    <button class="submit" type="submit">Enviar</button>
                </li>
            </ul>
        </form>
        <?php        
            if(isset($_GET['reg_error'])){
                $error=$_GET['reg_error'];
                switch($error){
                    case 'success':
                        echo '<div class="success"><p>Registro completado con éxito.</p></div>';
                        break;
                    case 'error':
                        echo '<div class=error> <p>Ha habido un error en el registro.</p> </div>';
                        break;
                    case 'mail':
                        echo '<div class="success"><p>Registro completado con éxito, pero no se ha podido enviar el email.</p></div>';
                        break;
                }
            } 
        ?>
        <article>
            <h1>Lista de precios</h1>
            <?php
                echo '<ul>';
                $selec_cuotas="SELECT Nombre_cuota, Precio, Descripcion FROM cuotas";
                $res=mysql_query($selec_cuotas,$conexion);
                while($fila=mysql_fetch_array($res))
                    echo '<li>'.$fila['Nombre_cuota'].': '.$fila['Precio'].'€ ('.$fila['Descripcion'].')</li>';
                echo '</ul>';
            ?>

        </article>
        <?php } ?>
    </section>
</div> <!-- end content -->