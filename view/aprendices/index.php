<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $rows = $aprendiz->index();
?>

<div class="mb-3">
    <a href="/CRUD_APRENDICES/view/aprendices/crear.php" class="btn btn-primary mb-3">Agregar un Nuevo Aprendiz</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-sm table-light">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">Tipo de Documento</th>
                <th scope="col" class="text-center">Documento</th>
                <th scope="col" class="text-center">Teléfono</th>
                <th scope="col" class="text-center">Edad</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td class="text-center"><?php echo $row['Nombre']; ?></td>
                        <td class="text-center"><?php echo $row['Apellido']; ?></td>
                        <td class="text-center"><?php echo $row['Tipo_documento']; ?></td>
                        <td class="text-center"><?php echo $row['documento']; ?></td>
                        <td class="text-center"><?php echo $row['telefono']; ?></td>
                        <td class="text-center"><?php echo $row['edad']; ?> años</td>
                        <td class="text-center">
                            <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modificar</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">Eliminar</a>
                        </td>
                    </tr>

                    <!-- Modal de confirmación de eliminación -->
                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">¿Desea eliminar al aprendiz?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Una vez eliminado, no podrá recuperar este aprendiz. ¿Está seguro de que desea continuar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No hay aprendices registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/footer.php");
?>
