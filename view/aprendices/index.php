<?php
    require_once("C://xampp/htdocs/CRUD_APRENDICES/view/head/head.php");
    require_once("C://xampp/htdocs/CRUD_APRENDICES/controller/aprendizController.php");
    $aprendiz = new AprendizController();
    $rows = $aprendiz->index();
?>

<div class="mb-3">
    <a href="/CRUD_APRENDICES/view/aprendices/crear.php" class="btn btn-success mb-3">
        Agregar un Nuevo Aprendiz
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-sm table-light">
        <thead class=" table-dark">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Tipo de Documento</th>
                <th class="text-center">Documento</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Edad</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td class="text-center"><?= $row['id']; ?></td>
                        <td class="text-center"><?= $row['Nombre']; ?></td>
                        <td class="text-center"><?= $row['Apellido']; ?></td>
                        <td class="text-center"><?= $row['Tipo_documento']; ?></td>
                        <td class="text-center"><?= $row['documento']; ?></td>
                        <td class="text-center"><?= $row['telefono']; ?></td>
                        <td class="text-center"><?= $row['edad']; ?> años</td>
                        <td class="text-center">
            
                            <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                
                    <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel<?= $row['id'] ?>">¿Eliminar aprendiz?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro que desea eliminar al aprendiz? Esta acción no se puede deshacer..</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
