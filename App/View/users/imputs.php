<!-- NOMBRE -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-person"></i></spam>
    <input type="text" class="form-control input-lg <?= isset($err->name) ? 'is-invalid' : '' ?>" name="name" placeholder="Ingresar Nombre" value="<?= isset($data->name) ? $data->name : '' ?>">
    <?php if (isset($err->name)) : ?>
        <div class="invalid-feedback">
            <?= $err->name ?>
        </div>
    <?php endif; ?>
</div>
<!-- USUARIO -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-envelope"></i></i></spam>
    <input type="email" class="form-control input-lg <?= isset($err->email) ? 'is-invalid' : '' ?>" name="email" placeholder="Ingresar Correo" value="<?= isset($data->email) ? $data->email : '' ?>">
    <?php if (isset($err->email)) : ?>
        <div class="invalid-feedback">
            <?= $err->email ?>
        </div>
    <?php endif; ?>
</div>
<!-- contraseña -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-key"></i></spam>
    <input type="password" class="form-control input-lg <?= isset($err->password) ? 'is-invalid' : '' ?>" name="password" placeholder="Ingresar Contraseña">
    <?php if (isset($err->password)) : ?>
        <div class="invalid-feedback">
            <?= $err->password ?>
        </div>
    <?php endif; ?>
</div>
<!-- Perfil -->
<div class="input-group mb-3">
    <spam class="input-group-text"><i class="bi bi-person-lines-fill"></i></spam>
    <select class="form-select flex-grow-1 <?= isset($err->rango) ? 'is-invalid' : '' ?>" name="rango">
        <option value="">Seleccione Perfil</option>
        <option <?= (isset($data->rango) && $data->rango == 'Administrador') ? 'selected' : '' ?> value="Administrador">Administrador</option>
        <option <?= (isset($data->rango) && $data->rango == 'Director') ? 'selected' : '' ?> value="Director">Director</option>
        <option <?= (isset($data->rango) && $data->rango == 'Docente') ? 'selected' : '' ?> value="Docente">Docente</option>
    </select>
    <?php if (isset($err->rango)) : ?>
        <div class="invalid-feedback">
            <?= $err->rango ?>
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
        <input type="file" name="photo" id="imagen" class="form-control visorFoto">
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
<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">