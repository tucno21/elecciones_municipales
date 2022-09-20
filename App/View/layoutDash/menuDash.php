<?php
// DATOS GENERALES ADMIN
$title = 'Tu Voto';
$mainLink = route('dashboard.index');
$logoAdmin = '../public/logo/logo.png';

//DATOS DEL USUARIO ADMIN
$userName = session()->user()->name;



//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'Logout',
        'url'  => route('login.logout'),
        'icon' => 'bi bi-box-arrow-right',
    ],
];

$rango = session()->user()->rango;

//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    ($rango == 'Administrador') ?
        ['header' => 'Dashboard',] : null,
    ($rango == 'Administrador') ?
        [
            'mode' => 'menu',
            'text' => 'Dashboard',
            'url'  => route('dashboard.index'),
            'icon' => 'bi bi-speedometer2',
        ] : null,
    ($rango == 'Administrador') ?
        ['header' => 'Usuarios',] : null,
    ($rango == 'Administrador') ?
        [
            'mode' => 'menu',
            'text' => 'Usuarios',
            'url'  => route('users.index'),
            'icon' => 'bi bi-person',
        ] : null,
    ($rango == 'Administrador' || $rango == 'Director' || $rango == 'Docente') ?
        ['header' => 'Estudiantes',] : null,
    ($rango == 'Administrador' || $rango == 'Director' || $rango == 'Docente') ?
        [
            'mode' => 'menu',
            'text' => 'Estudiantes',
            'url'  => route('students.index'),
            'icon' => 'bi bi-people',
        ] : null,
    ($rango == 'Administrador' || $rango == 'Director') ?
        ['header' => 'Elecciones'] : null,
    ($rango == 'Administrador' || $rango == 'Director') ?
        [
            'mode' => 'menu',
            'text' => 'Candidatos',
            'url'  => route('candidates.index'),
            'icon' => 'bi bi-person-workspace',
        ] : null,
    ($rango == 'Administrador' || $rango == 'Director') ?
        [
            'mode' => 'menu',
            'text' => 'Fecha de Electoral',
            'url'  => route('votingdate.index'),
            'icon' => 'bi bi-calendar-day',
        ] : null,
    ($rango == 'Administrador') ?
        ['header' => 'Diseño'] : null,
    ($rango == 'Administrador') ?
        [
            'mode' => 'menu',
            'text' => 'Diseño',
            'url'  => route('design.index'),
            'icon' => 'bi bi-palette',
        ] : null,
];



//ENLACES PARA CSS Y JS html
$linkURL = base_url;

$linksCss = [
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet',
    $linkURL . '/assets/css/light.css',
    $linkURL . '/assets/css/icon/bootstrap-icons.css',
    $linkURL . '/assets/plugins/flatpickr/flatpickr.min.css',
];

$linksScript = [
    $linkURL . '/assets/js/app.js',
    $linkURL . '/assets/js/datatable.js',
    $linkURL . '/assets/js/visorfoto.js',
    $linkURL . '/assets/js/sweetalert2.js',
    $linkURL . '/assets/plugins/flatpickr/flatpickr.js',
    $linkURL . '/assets/js/fecha.js',
];
