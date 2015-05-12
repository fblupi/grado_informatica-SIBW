<div id="login">
    <?php
        if(isset($_SESSION['usuario'])){?>
        <h1>Cuenta de usuario</h1>
        <?php echo '<p><a href="index.php?cat=usuario">'.$_SESSION['usuario'].'</a></p>'; ?>
            <form class="contact_form" action="contenido/sesion/scriptLogout.php" method="post">
                <ul>
                    <li>
                        <button class="submit" type="submit">Cerrar sesión</button>
                    </li>
                </ul>
            </form>
        <?php   if($_SESSION['privilegio']==1) {
                echo '<a href="index.php?cat=opciones-admin">Opciones de administrador</a>';
            } ?>
    <?php }else{?>
        <h1>Iniciar Sesión</h1>
        <form class="contact_form" action="contenido/sesion/scriptLogin.php" method="post" name="login_form">
            <ul>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="turing@gmail.com" required/>
                </li>
                <li>
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="contrasena" required/>
                </li>
                <li>
                    <button class="submit" type="submit">Enviar</button>
                </li>

            </ul>
        </form>
            <?php if(isset($_GET['login_error'])){
                $error=$_GET['login_error'];
                switch($error){
                    case 'no-contra';
                        echo '<div class="error"><p>La contraseña es incorrecta</p></div>';
                        break;
                    case 'no-email':
                        echo '<div class="error"><p>El email es incorrecto</p></div>';
                        break;
                }
            }?>
            <a href="index.php?cat=olvido-contra">Olvidé mi contraseña</a>
    <?php } ?>


</div>