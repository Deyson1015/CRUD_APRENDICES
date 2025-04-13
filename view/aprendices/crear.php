<?php
    require_once("C:/laragon/www/CRUD_APRENDICES/view/head/head.php");
?>
    
    <form>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="primer_nombre" class="form-label">Primer Nombre</label>
            <input type="text" name="primer_nombre" class="form-control" id="primer_nombre" required>
        </div>
        <div class="col-md-3">
            <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" class="form-control" id="segundo_nombre">
        </div>
        <div class="col-md-3">
            <label for="primer_apellido" class="form-label">Primer Apellido</label>
            <input type="text" name="primer_apellido" class="form-control" id="primer_apellido" required>
        </div>
        <div class="col-md-3">
            <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" class="form-control" id="segundo_apellido">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="tipo_documento" class="form-label">Tipo de documento</label>
            <select class="form-select" name="tipo_documento" id="tipo_documento" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="1">Tarjeta de identidad</option>
                <option value="2">Cédula de ciudadania</option>
                <option value="3">Cédula de extranjería</option>
                <option value="4">Tarjeta de extranjería</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="documento" class="form-label">Número de Documento</label>
            <input type="text" name="documento" class="form-control" id="documento" minlength="5" maxlength="10" required>
        </div>
        <div class="col-md-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" required>
        </div>
        <div class="col-md-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" id="correo" autocomplete="on" required>
        </div>
        <div class="col-md-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono" pattern="[0-9]{7,10}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="sexo" class="form-label">Género</label>
            <select class="form-select" name="sexo" id="sexo" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="grupo_sanguineo" class="form-label">Grupo sanguíneo</label>
            <select class="form-select" name="grupo_sanguineo" id="grupo_sanguineo" required>
                <option selected disabled>Seleccione una opción</option>
                <option value="1">A+</option>
                <option value="2">A-</option>
                <option value="3">B+</option>
                <option value="4">B-</option>
                <option value="5">AB+</option>
                <option value="6">AB-</option>
                <option value="7">O+</option>
                <option value="8">O-</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="programa_formacion" class="form-label">Programa de Formación</label>
            <select class="form-select" name="programa_formacion" id="programa_formacion" required>
                <optgroup label="Técnicos">
                    <option value="Técnico en sistemas">Técnico en Sistemas</option>
                    <option value="Técnico en asistencia administrativa">Técnico en Asistencia Administrativa</option>
                    <option value="Técnico en cocina">Técnico en Cocina</option>
                    <option value="Técnico en contabilidad">Técnico en Contabilidad</option>
                    <option value="Técnico en manejo ambiental">Técnico en Manejo Ambiental</option>
                    <option value="Técnico en logística empresarial">Técnico en Logística Empresarial</option>
                </optgroup>
                <optgroup label="Tecnólogos">
                    <option value="Tecnólogo en análisis y desarrollo de software">Tecnólogo en ADSO</option>
                    <option value="Tecnólogo en gestión administrativa">Tecnólogo en Gestión Administrativa</option>
                    <option value="Tecnólogo en gestión del talento humano">Tecnólogo en Talento Humano</option>
                    <option value="Tecnólogo en gestión logística">Tecnólogo en Logística</option>
                    <option value="Tecnólogo en producción agropecuaria ecológica">Tecnólogo en Agropecuaria</option>
                    <option value="Tecnólogo en control ambiental">Tecnólogo en Control Ambiental</option>
                </optgroup>
            </select>
        </div>
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary me-2">Guardar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </div>
</form>

<?php
    require_once("C:/laragon/www/CRUD_APRENDICES/view/head/footer.php");
?>
