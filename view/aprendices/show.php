<?php
    require_once("C://laragon/www/CRUD_APRENDICES/view/head/head.php");
    require_once("C://laragon/www/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $date= $aprendiz->show($_GET['id']);
?>
<h2 class="text-center">Detalles del Aprendiz</h2>
<table class ="container fluid-table table table-striped table-bordered table-hover table-sm">
    <thead class="table-dark">
        <tr>
            <th colspan="15" class="text-center">Información del Aprendiz</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>ID</th>
            <td scope ="col"><?= $date['id'] ?></td>
        </tr>
        <tr>
            <th>Primer Nombre</th>
            <td scope ="col"><?= $date['primer_nombre'] ?></td>
        </tr>
        <tr>
            <th>Segundo Nombre</th>
            <td scope ="col"><?= $date['segundo_nombre'] ?></td>
        </tr>
        <tr>
            <th>Primer Apellido</th>
            <td scope ="col"><?= $date['primer_apellido'] ?></td>
        </tr>
        <tr>
            <th>Segundo Apellido</th>
            <td scope ="col"><?= $date['segundo_apellido'] ?></td>
        </tr>
    </tbody>
    <thead class="table-dark">
        <tr>
            <th colspan="15" class="text-center">Identificación y Contacto</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Tipo Documento</th>
            <td scope ="col"><?= $date['Tipo_documento'] ?></td>
        </tr>
        <tr>
            <th>Documento</th>
            <td scope ="col"><?= $date['documento'] ?></td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td scope ="col"><?= $date['telefono'] ?></td>
        </tr>
        <tr>
            <th>Correo</th>
            <td scope ="col"><?= $date['correo'] ?></td>
        </tr>
    </tbody>
    <thead class="table-dark">
        <tr>
            <th colspan="15" class="text-center">Información Complementaria</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Fecha Nacimiento</th>
            <td scope ="col"><?= $date['fecha_nacimiento'] ?></td>
        </tr>
        <tr>
            <th>Genero</th>
            <td scope ="col"><?= $date['genero'] ?></td>
        </tr>
        <tr>
            <th>Grupo Sanguineo</th>
            <td scope ="col"><?= $date['grupo_sanguineo'] ?></td>
        </tr>
    </tbody>
    <thead class="table-dark">
        <tr>
            <th colspan="15" class="text-center">Programa de Formación</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Programa Formacion</th>
            <td scope ="col"><?= $date['programa_formacion'] ?></td>
        </tr>
        <tr>
            <th>Nivel</th>
            <td scope ="col"><?= $date['nivel'] ?></td>
        </tr>
        <tr>
            <th>Fecha Inicio</th>
            <td scope ="col"><?= $date['fecha_inicio'] ?></td>
        </tr>
        <tr>
            <th>Fecha Fin</th>
            <td scope ="col"><?= $date['fecha_fin'] ?></td>
        </tr>
    </tbody>
</table>

<?php
require_once("C://laragon/www/CRUD_APRENDICE/view/head/footer.php");
?>