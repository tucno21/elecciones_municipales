<?php include ext('layoutDash.menuDash') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= isset($titleWeb) ? $titleWeb : 'Elecciones municipales' ?></title>

    <?php foreach ($linksCss as $value) : ?>
        <link href="<?= $value ?>" rel="stylesheet" />
    <?php endforeach; ?>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="<?= $mainLink ?>">
                    <span class="align-middle me-3"><?= $title ?></span>
                </a>

                <ul class="sidebar-nav">

                    <?php foreach ($linksSidebar as $key => $value) : ?>
                        <!-- UNA SOLA LINEA - TITULO-->
                        <?php if (isset($value['header'])) : ?>
                            <li class="sidebar-header"><?= $value['header']; ?></li>
                        <?php endif; ?>
                        <!-- UNA SOLA LINEA - LINK-->
                        <?php if (isset($value['mode']) && $value['mode'] == 'menu') : ?>
                            <li class="sidebar-item">
                                <a href="<?= $value['url']; ?>" class="sidebar-link">
                                    <i class="<?= $value['icon']; ?>"></i>
                                    <span class="align-middle"><?= $value['text']; ?></span>
                                </a>
                            </li>

                        <?php endif; ?>
                        <!-- SUBMENUS - LINK-->
                        <?php if (isset($value['mode']) && $value['mode'] == 'submenu') : ?>

                            <li class="sidebar-item">
                                <a data-bs-target="#sidebar<?= $value['text']; ?>" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                    <i class="<?= $value['icon']; ?>"></i>
                                    <span class="align-middle"><?= $value['text']; ?></span>
                                </a>
                                <ul class="sidebar-dropdown list-unstyled collapse" id="sidebar<?= $value['text']; ?>" data-bs-parent="#sidebar">
                                    <?php foreach ($value['submenu'] as $subValue) : ?>
                                        <li class="sidebar-item">
                                            <a href="<?= $subValue['url']; ?>" class="sidebar-link">
                                                <?= $subValue['text']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </ul>

            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle text-dark">
                    <i class="bi bi-list fs-3 fw-bold"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" /> -->
                                <i class="bi bi-person-circle"></i>
                                <span class="text-dark"><?= $userName ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <?php foreach ($menuSession as $ms) : ?>
                                    <a href="<?= $ms['url'] ?>" class="dropdown-item">
                                        <i class="<?= $ms['icon'] ?>"></i>
                                        <span><?= $ms['text'] ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>