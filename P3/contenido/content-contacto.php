<div id="content">
    <section>
        <form  id="formContacto" class="contact_form" onsubmit="return validar('contact_form');" action="php/mail.php" method="post" name="contact_form" novalidate>
            <h1>Formulario de Contacto</h1>
            <ul>
                <li>
                    <label for="name">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Alan Turing"/>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="turing@gmail.com"/>
                </li>
                <li>
                    <label for="subject">Asunto:</label>
                    <input type="text" name="asunto" placeholder="Consulta"/>
                </li>
                <li>
                    <label for="message">Mensaje:</label>
                    <textarea type="textarea" name="mensaje" cols="40" rows="6" placeholder="Descripción detallada del motivo de consulta"></textarea>
                </li>
                <li>
                    <button class="submit"  >Enviar</button>
                </li>
            </ul>
        </form>
    </section>
</div> <!-- end content -->