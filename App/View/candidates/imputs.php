<!-- NOMBRE -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-person"></i></spam>
    <input type="text" class="form-control input-lg <?= isset($err->name) ? 'is-invalid' : '' ?>" name="name" placeholder="Ingresar Nombre Completo" value="<?= isset($data->name) ? $data->name : '' ?>">
    <?php if (isset($err->name)) : ?>
        <div class="invalid-feedback">
            <?= $err->name ?>
        </div>
    <?php endif; ?>
</div>
<!-- DNI -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-postcard"></i></spam>
    <input type="number" class="form-control input-lg <?= isset($err->dni) ? 'is-invalid' : '' ?>" name="dni" placeholder="Ingresar DNI" value="<?= isset($data->dni) ? $data->dni : '' ?>">
    <?php if (isset($err->dni)) : ?>
        <div class="invalid-feedback">
            <?= $err->dni ?>
        </div>
    <?php endif; ?>
</div>
<!-- group_name -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-paragraph"></i></spam>
    <input type="text" class="form-control input-lg <?= isset($err->group_name) ? 'is-invalid' : '' ?>" name="group_name" placeholder="Ingresar Nombre de la agrupación" value="<?= isset($data->group_name) ? $data->group_name : '' ?>">
    <?php if (isset($err->group_name)) : ?>
        <div class="invalid-feedback">
            <?= $err->group_name ?>
        </div>
    <?php endif; ?>
</div>

<!-- estado -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-shield-lock"></i></spam>
    <div class="form-control  <?= isset($err->estado) ? 'is-invalid' : '' ?>">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" <?= (isset($data->estado) && $data->estado == 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="estado1">Habilitar</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" <?= (isset($data->estado) && $data->estado == 0) ? 'checked' : '' ?>>
            <label class="form-check-label" for="estado2">Inhabilitar</label>
        </div>
    </div>
    <?php if (isset($err->estado)) : ?>
        <div class="invalid-feedback">
            <?= $err->estado ?>
        </div>
    <?php endif; ?>
</div>

<!-- foto -->
<div class="mb-3">
    <label for="imagen">Foto:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <spam class="input-group-text"><i class="bi bi-file-person-fill"></i></spam>
        </div>
        <input type="file" name="photo" id="imagen" class="form-control visorFoto <?= isset($err->photo) ? 'is-invalid' : '' ?>">
        <?php if (isset($err->photo)) : ?>
            <div class="invalid-feedback">
                <?= $err->photo ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="input-group text-center d-flex justify-content-center">
    <div class="" style="width: 8rem;">
        <?php if (!empty($data->photo)) : ?>
            <img class="img-thumbnail card-img-top previsualizar" src="<?= base_url('/assets/img/' . $data->photo) ?>" alt="Card image cap">
        <?php else : ?>
            <img class="img-thumbnail card-img-top previsualizar" src="<?= base_url('/assets/img/user.png') ?>" alt="Card image cap">
        <?php endif; ?>
        <div class="my-2">
            <p class="card-text">Peso máximo de 1mb</p>
        </div>
    </div>
</div>
<!-- LOGO -->
<div class="mb-3">
    <label for="logo">logo:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <spam class="input-group-text"><i class="bi bi-slack"></i></spam>
        </div>
        <input type="file" name="logo" id="logo" class="form-control visorLogo  <?= isset($err->logo) ? 'is-invalid' : '' ?>">
        <?php if (isset($err->logo)) : ?>
            <div class="invalid-feedback">
                <?= $err->logo ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="input-group text-center d-flex justify-content-center">
    <div class="" style="width: 8rem;">
        <?php if (!empty($data->logo)) : ?>
            <img class="img-thumbnail card-img-top previsualizar2" src="<?= base_url('/assets/img/' . $data->logo) ?>" alt="Card image cap">
        <?php else : ?>
            <img class="img-thumbnail card-img-top previsualizar2" src="<?= base_url('/assets/img/logo.jpg') ?>" alt="Card image cap">
        <?php endif; ?>
        <div class="my-2">
            <p class="card-text">Peso máximo de 1mb</p>
        </div>
    </div>
</div>



<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">