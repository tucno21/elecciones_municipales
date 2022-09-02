<?php include ext('layoutdash.head') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Blank Page</h1>

        <div class="row">
            <div class="col-12">
                <form action="<?= route('dashboard.create') ?>" method="POST">
                    <div class="row g-3">

                        <?php include_once 'imputs.php' ?>

                        <div class="col-md-12">
                            <button class="btn btn-lg btn-primary mt-3" type="submit">Crear Producto</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</main>
<?php include ext('layoutdash.footer') ?>