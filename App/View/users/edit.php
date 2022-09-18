<?php include ext('layoutdash.head') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar Usuario</h1>

        <div class="mx-auto card w-75">
            <div class="card-header">
                <a class="btn btn-secondary" href="<?= route('users.index') ?>">Volver</a>
            </div>
            <form action="<?= route('users.edit') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf() ?>
                <div class="card-body  p-0 px-4">
                    <?php include_once 'imputs.php' ?>
                </div>

                <div class="text-center card-footer p-0 pb-3">
                    <button type="submit" class="btn btn-dark btn-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include ext('layoutdash.footer') ?>