<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $date= $aprendiz->show($_GET['id']);
?>
    <form action="update.php" method="POST" autocomplete="off">
        <h2 class="text-center">Editar Aprendiz</h2>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $date['id'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Primer Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="primer_nombre" class="form-control" value="<?= $date['primer_nombre'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Segundo Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="segundo_nombre" class="form-control" value="<?= $date['segundo_nombre'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Primer Apellido</label>
            <div class="col-sm-10">
            <input type="text" name="primer_apellido" class="form-control" value="<?= $date['primer_apellido'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Segundo Apellido</label>
            <div class="col-sm-10">
            <input type="text" name="segundo_apellido" class="form-control" value="<?= $date['segundo_apellido'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de Documento</label>
            <div class="col-sm-10">
            <select class="form-select" name="id_tipo_documento" required>
                <option value="" selected disabled>Seleccione una opción</option>
                <option value="1">Tarjeta de identidad</option>
                <option value="2">Cédula de ciudadania</option>
                <option value="3">Cédula de extranjería</option>
                <option value="4">Tarjeta de extranjería</option>
            </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Número de Documento</label>
            <div class="col-sm-10">
            <input type="text" name="documento" class="form-control" minlength="5" maxlength="10" value="<?= $date['documento'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
            <div class="col-sm-10">
            <input type="date" name="fecha_nacimiento" class="form-control" value="<?= $date['fecha_nacimiento'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Correo Electrónico</label>
            <div class="col-sm-10">
            <input type="email" name="correo" class="form-control" value="<?= $date['correo'] ?>" autocomplete="on" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
            <input type="tel" name="telefono" class="form-control" pattern="[0-9]{7,10}" value="<?= $date['telefono'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label fw-bold">Género</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_genero" required>
                    <option value="" disabled <?= ($dato['id_genero'] == '') ? 'selected' : '' ?>>Seleccione una opción</option>
                    <option value="1" <?= ($dato['id_genero'] == 1) ? 'selected' : '' ?>>Masculino</option>
                    <option value="2" <?= ($dato['id_genero'] == 2) ? 'selected' : '' ?>>Femenino</option>
                    <option value="3" <?= ($dato['id_genero'] == 3) ? 'selected' : '' ?>>Otro</option>
                </select>
            </div>
        </div>  

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label fw-bold">Grupo Sanguíneo</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_grupo_sanguineo" required>
                    <option value="" disabled <?= ($dato['id_grupo_sanguineo'] == '') ? 'selected' : '' ?>>Seleccione una opción</option>
                    <option value="1" <?= ($dato['id_grupo_sanguineo'] == 1) ? 'selected' : '' ?>>A+</option>
                    <option value="2" <?= ($dato['id_grupo_sanguineo'] == 2) ? 'selected' : '' ?>>A-</option>
                    <option value="3" <?= ($dato['id_grupo_sanguineo'] == 3) ? 'selected' : '' ?>>B+</option>
                    <option value="4" <?= ($dato['id_grupo_sanguineo'] == 4) ? 'selected' : '' ?>>B-</option>
                    <option value="5" <?= ($dato['id_grupo_sanguineo'] == 5) ? 'selected' : '' ?>>O+</option>
                    <option value="6" <?= ($dato['id_grupo_sanguineo'] == 6) ? 'selected' : '' ?>>O-</option>
                </select>
            </div>
        </div>  

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label fw-bold">Programa</label>
            <div class="col-sm-10">
                <select class="form-select" name="programa" required>
                    <optgroup label="Técnicos">
                        <option value="1" <?= ($dato['programa'] == 1) ? 'selected' : '' ?>>Técnico en Sistemas</option>
                        <option value="2" <?= ($dato['programa'] == 2) ? 'selected' : '' ?>>Técnico en Asistencia Administrativa</option>
                        <option value="3" <?= ($dato['programa'] == 3) ? 'selected' : '' ?>>Técnico en Cocina</option>
                        <option value="4" <?= ($dato['programa'] == 4) ? 'selected' : '' ?>>Técnico en Contabilidad</option>
                        <option value="5" <?= ($dato['programa'] == 5) ? 'selected' : '' ?>>Técnico en Manejo Ambiental</option>
                        <option value="6" <?= ($dato['programa'] == 6) ? 'selected' : '' ?>>Técnico en Logística Empresarial</option>
                    </optgroup>
                    <optgroup label="Tecnólogos">
                        <option value="7" <?= ($dato['programa'] == 7) ? 'selected' : '' ?>>Tecnólogo en ADSO</option>
                        <option value="8" <?= ($dato['programa'] == 8) ? 'selected' : '' ?>>Tecnólogo en Gestión Administrativa</option>
                        <option value="9" <?= ($dato['programa'] == 9) ? 'selected' : '' ?>>Tecnólogo en Talento Humano</option>
                        <option value="10" <?= ($dato['programa'] == 10) ? 'selected' : '' ?>>Tecnólogo en Logística</option>
                        <option value="11" <?= ($dato['programa'] == 11) ? 'selected' : '' ?>>Tecnólogo en Agropecuaria</option>
                        <option value="12" <?= ($dato['programa'] == 12) ? 'selected' : '' ?>>Tecnólogo en Control Ambiental</option>
                    </optgroup>
                </select>
            </div>
        </div>  

        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicio</label>
            <div class="col-sm-10">
            <input type="date" name="fecha_inicio" class="form-control" value="<?= $date['fecha_inicio'] ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Fin</label>
            <div class="col-sm-10">
            <input type="date" name="fecha_fin" class="form-control" value="<?= $date['fecha_fin'] ?>" required>
            </div>  
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" value="Actualizar">
                <a href="show.php?id=<?=$date['id']?> " class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

<?php
require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>