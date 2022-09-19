<!-- NOMBRE -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-person"></i></spam>
    <input type="text" class="form-control input-lg <?= isset($err->name) ? 'is-invalid' : '' ?>" name="name" placeholder="Ingresar Nombre completo" value="<?= isset($data->name) ? $data->name : '' ?>">
    <?php if (isset($err->name)) : ?>
        <div class="invalid-feedback">
            <?= $err->name ?>
        </div>
    <?php endif; ?>
</div>
<!-- DNI -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-person-video"></i></spam>
    <input type="number" class="form-control input-lg <?= isset($err->dni) ? 'is-invalid' : '' ?>" name="dni" placeholder="Ingresar DNI" value="<?= isset($data->dni) ? $data->dni : '' ?>">
    <?php if (isset($err->dni)) : ?>
        <div class="invalid-feedback">
            <?= $err->dni ?>
        </div>
    <?php endif; ?>
</div>
<!-- contraseña -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-house-door"></i></spam>
    <input type="text" class="form-control input-lg <?= isset($err->aula) ? 'is-invalid' : '' ?>" name="aula" placeholder="Grado sección : 2A" value="<?= isset($data->aula) ? $data->aula : '' ?>">
    <?php if (isset($err->aula)) : ?>
        <div class="invalid-feedback">
            <?= $err->aula ?>
        </div>
    <?php endif; ?>
</div>

<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">