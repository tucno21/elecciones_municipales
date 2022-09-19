<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu voto</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <style>
        .tamaño {
            font-size: 1.4rem;
            outline: none;
            border: none;
            display: inline-block;
            width: 100%;
            padding: 5% 1% 1% 1%;
        }

        .color-fondo {
            background-color: <?= $colegio->color_b; ?>;
        }

        .color-bot {
            background-color: <?= $colegio->color_b; ?>;
            border: 1px solid <?= $colegio->color_b; ?>;
        }

        .color-bot:hover {
            background-color: <?= $colegio->color_s; ?>;
            border: 1px solid <?= $colegio->color_s; ?>;
        }

        .color-footer {
            background-color: <?= $colegio->color_s; ?>;
        }

        .btn-outline-primary {
            --bs-btn-color: <?= $colegio->color_b; ?>;
            --bs-btn-border-color: <?= $colegio->color_b; ?>;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: <?= $colegio->color_b; ?>;
            --bs-btn-hover-border-color: <?= $colegio->color_b; ?>;
            --bs-btn-focus-shadow-rgb: 13, 110, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: <?= $colegio->color_b; ?>;
            --bs-btn-active-border-color: <?= $colegio->color_b; ?>;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: <?= $colegio->color_b; ?>;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: <?= $colegio->color_b; ?>;
            --bs-gradient: none;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: <?= $colegio->color_s; ?>;
            --bs-btn-border-color: <?= $colegio->color_s; ?>;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: <?= $colegio->color_b; ?>;
            --bs-btn-hover-border-color: <?= $colegio->color_b; ?>;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: <?= $colegio->color_b; ?>;
            --bs-btn-active-border-color: <?= $colegio->color_b; ?>;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: <?= $colegio->color_s; ?>;
            --bs-btn-disabled-border-color: <?= $colegio->color_s; ?>;
        }

        .px-6 {
            padding-right: 4rem !important;
            padding-left: 4rem !important;
        }
    </style>
</head>

<body class="d-flex h-100 text-center">

    <div class="d-flex w-100 h-100 mx-auto flex-column">
        <header class="mb-auto">
            <div class="shadow-sm color-fondo">
                <div class="container ">
                    <p class="p-3 text-center text-white fs-3">
                        <strong>Institución Educativa <?= $colegio->name_ie; ?></strong>
                    </p>
                </div>
            </div>
        </header>

        <main>

            <section class="container py-3 text-center">
                <div class="row py-lg-3">
                    <div class="mx-auto col-lg-6 col-md-8">
                        <h1 class="fw-light">Bienvenido(a): <?= session()->get('student')->name ?></h1>
                        <p class="lead text-muted">Elige al alcalde o alcaldeza escolar para el siguiente año, tu voto vale mucho y vota a conciencia</p>

                    </div>
                </div>
                <?php
                if (isset($errores)) {
                    foreach ($errores as $error) :
                ?>
                        <div class="alert alert-danger">
                            <?= $error; ?>
                        </div>
                <?php
                    endforeach;
                }

                ?>
            </section>

            <div class="py-3">
                <div class="container">
                    <form method="POST" action="<?= route('tuvoto.index') ?>">
                        <?= csrf() ?>
                        <?php foreach ($candidatos as $cand) : ?>
                            <div class="row">
                                <!-- nombre del grupo -->
                                <div class="border col-6 border-secondary d-flex justify-content-center p-0">
                                    <input type="radio" class="btn-check" name="candidatoId" id="<?= $cand->id; ?>" autocomplete="off" value="<?= $cand->id; ?>">
                                    <label class="btn btn-outline-primary text-uppercase tamaño" for="<?= $cand->id; ?>"><?= $cand->group_name; ?></label>
                                </div>
                                <!-- logo del candidato -->
                                <div class="border col-3 border-secondary d-flex justify-content-center">
                                    <label for="<?= $cand->id; ?>">
                                        <img width="100" class="p-1" src="<?= base_url('/assets/img/' . $cand->logo) ?>" alt="foto">
                                    </label>
                                </div>
                                <!-- foto del candidato -->
                                <div class="border col-3 border-secondary d-flex justify-content-center">
                                    <label for="<?= $cand->id; ?>">
                                        <img width="100" class="p-1" src="<?= base_url('/assets/img/' . $cand->photo) ?>" alt="foto">
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <input type="hidden" name="id" value="<?= session()->get('student')->id ?>">

                        <div class="mt-5 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary color-bot fs-4 px-6">Votar</button>
                        </div>

                    </form>
                </div>
            </div>

        </main>

        <footer class="mt-auto py-4 text-muted color-footer">
            <div class="container text-white">
                <p class="mb-1">Desarrollador: Carlos tucno Vasquez</p>
            </div>
        </footer>
    </div>

</body>

</html>