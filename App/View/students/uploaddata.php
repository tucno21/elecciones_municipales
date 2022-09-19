<?php include ext('layoutdash.head') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Crear Estudiante</h1>

        <div class="mx-auto card w-75">
            <div class="card-header">
                <a class="btn btn-secondary" href="<?= route('students.index') ?>">Volver</a>
            </div>
            <form action="<?= route('students.uploaddata') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf() ?>
                <div class="card-body  p-0 px-4">
                    <div class="mb-3">
                        <label for="imagen">Archivo excel:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text">
                                    <i class="bi bi-filetype-xls"></i>
                                </spam>
                            </div>
                            <input type="file" name="file" id="imagen" accept=".xls,.xlsx" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="text-center card-footer p-0 pb-3">
                    <button type="submit" class="btn btn-dark btn-lg">Enviar</button>
                </div>
            </form>
        </div>
    </div>


</main>
<?php include ext('layoutdash.footer') ?>