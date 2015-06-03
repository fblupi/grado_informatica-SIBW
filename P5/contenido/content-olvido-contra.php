<div id="content">
    <section>
        <h1>Formulario de recuperación de contraseña</h1>
        <form class="contact_form" action="contenido/contrasena/scriptRecuperacion.php" method="post" name="recuperacion_form">
            <ul>
                <li>
                    <label for="name">Email:</label>
                    <input type="email" name="email"  required/>
                </li>
                <li>
                    <button class="submit" type="submit">Recuperar contraseña</button>
                </li>
            </ul>
        </form>
        <?php if(isset($_GET['olv_error'])){
            $error=$_GET['olv_error'];
            switch($error){
                case 'success':
                    echo '<div class="success"> <p>Se le ha enviado un email con su contraseña</p></div>';
                    break;
                case 'mail':
                    echo '<div class="error"> <p>Ha habido un problema al enviarle el correo pongase en contacto con el administrador.</p></div>';
                    break;
                case 'no-user':
                    echo '<div class="error"> <p>El usuario indicado no pertenece al sistema.</p></div>';
                    break;
            }

        } ?>
    </section>
</div>