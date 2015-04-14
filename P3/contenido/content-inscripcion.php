<div id="content">
    <section>
        <form class="contact_form" action="" method="post" name="inscripcion_form" onsubmit="return validar('inscripcion_form')" novalidate>
            <h1>Formulario de Inscripción</h1>
            <ul>
                <li>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" placeholder="Alan Turing" required/>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="turing@gmail.com" required/>
                </li>
                <li>
                    <label for="subject">Teléfono:</label>
                    <input type="text" name="telefono" placeholder="612345678"/>
                </li>
                <li>
                    <label for="type">Opción: </label>
                    <select name="type" required>
                        <option value="profesional">Profesional</option>
                        <option value="profesor">Profesor</option>
                        <option value="alumno">Alumno</option>
                    </select>
                </li>
                <li>
                    <button class="submit" type="submit">Enviar</button>
                </li>
            </ul>
        </form>
        <article>
            <h1>Lista de precios</h1>
            <ul>
                <li>Profesional: 15€</li>
                <li>Profesor: 5€</li>
                <li>Alumno: 10€</li>
            </ul>
        </article>
    </section>
</div> <!-- end content -->