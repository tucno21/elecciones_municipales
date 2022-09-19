<?php include ext('layoutdash.head') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Cambio de fecha electoral</h1>

        <div class="mx-auto card w-75">
            <div class="card-header">
                <a class="btn btn-secondary" href="<?= route('votingdate.index') ?>">Volver</a>
            </div>
            <form action="<?= route('votingdate.edit') ?>" method="POST">
                <?= csrf() ?>
                <div class="card-body  p-0 px-4">
                    <!-- FECHA -->
                    <div class="input-group mb-3">
                        <spam class="input-group-text"><i class="bi bi-calendar-date"></i></spam>
                        <input type="text" class="form-control input-lg <?= isset($err->fecha) ? 'is-invalid' : '' ?>" name="fecha" placeholder="Ingresa la fecha" value="<?= isset($data->fecha) ? $data->fecha : '' ?>" id="fechaElectoral">
                        <?php if (isset($err->fecha)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->fecha ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- HORA INICIO -->
                    <div class="input-group mb-3">
                        <spam class="input-group-text"><i class="bi bi-hourglass-top"></i></spam>
                        <input type="text" class="form-control input-lg <?= isset($err->hora_inicio) ? 'is-invalid' : '' ?>" name="hora_inicio" placeholder="Hora de inicio" value="<?= isset($data->hora_inicio) ? $data->hora_inicio : '' ?>" id="horaInicio">
                        <?php if (isset($err->hora_inicio)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->hora_inicio ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- HORA FIN -->
                    <div class="input-group mb-3">
                        <spam class="input-group-text"><i class="bi bi-hourglass-bottom"></i></spam>
                        <input type="text" class="form-control input-lg <?= isset($err->hora_fin) ? 'is-invalid' : '' ?>" name="hora_fin" placeholder="Hora que Termina" value="<?= isset($data->hora_fin) ? $data->hora_fin : '' ?>" id="horaFin">
                        <?php if (isset($err->hora_fin)) : ?>
                            <div class="invalid-feedback">
                                <?= $err->hora_fin ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="text-center card-footer p-0 pb-3">
                    <button type="submit" class="btn btn-dark btn-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include ext('layoutdash.footer') ?>