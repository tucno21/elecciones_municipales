<?php include ext('layoutdash.head') ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Modificar Datos</h1>

        <div class="mx-auto card w-75">
            <div class="card-header">
                <a class="btn btn-secondary" href="<?= route('design.index') ?>">Volver</a>
            </div>
            <form action="<?= route('design.edit') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf() ?>
                <div class="card-body  p-0 px-4">
                    <!-- NOMBRE IE-->
                    <div class="">
                        <p class="p-0 m-0 fw-bold">Nombre de la IE</p>
                        <div class="input-group mb-3">
                            <spam class="input-group-text"><i class="bi bi-house-door-fill"></i></spam>
                            <input type="text" class="form-control input-lg <?= isset($err->name_ie) ? 'is-invalid' : '' ?>" name="name_ie" value="<?= isset($data->name_ie) ? $data->name_ie : '' ?>">
                            <?php if (isset($err->name_ie)) : ?>
                                <div class="invalid-feedback">
                                    <?= $err->name_ie ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- coloe base-->
                    <div class="">
                        <p class="p-0 m-0 fw-bold">Color base formato hex ejempplo: #ff55dd</p>
                        <div class="input-group mb-3">
                            <spam class="input-group-text"><i class="bi bi-eyedropper"></i></spam>
                            <input type="color" class="form-control form-control-color  input-lg <?= isset($err->color_b) ? 'is-invalid' : '' ?>" name="color_b" value="<?= isset($data->color_b) ? $data->color_b : '' ?>">
                            <?php if (isset($err->color_b)) : ?>
                                <div class="invalid-feedback">
                                    <?= $err->color_b ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- color base IE-->
                    <div class="">
                        <p class="p-0 m-0 fw-bold">Color suave formato hex ejempplo: #ff55dd</p>
                        <div class="input-group mb-3">
                            <spam class="input-group-text"><i class="bi bi-eyedropper"></i></spam>
                            <input type="color" class="form-control form-control-color  input-lg <?= isset($err->color_s) ? 'is-invalid' : '' ?>" name="color_s" value="<?= isset($data->color_s) ? $data->color_s : '' ?>">
                            <?php if (isset($err->color_s)) : ?>
                                <div class="invalid-feedback">
                                    <?= $err->color_s ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- fecha electoral-->
                    <div class="">
                        <p class="p-0 m-0 fw-bold">Año electoral</p>
                        <div class="input-group mb-3">
                            <spam class="input-group-text"><i class="bi bi-calendar3"></i></spam>
                            <input type="number" class="form-control input-lg <?= isset($err->fecha) ? 'is-invalid' : '' ?>" name="fecha" value="<?= isset($data->fecha) ? $data->fecha : '' ?>">
                            <?php if (isset($err->fecha)) : ?>
                                <div class="invalid-feedback">
                                    <?= $err->fecha ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- foto -->
                    <div class="mb-3">
                        <label for="imagen">Logo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <spam class="input-group-text"><i class="bi bi-image"></i></spam>
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
                </div>

                <div class="text-center card-footer p-0 pb-3">
                    <button type="submit" class="btn btn-dark btn-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include ext('layoutdash.footer') ?>