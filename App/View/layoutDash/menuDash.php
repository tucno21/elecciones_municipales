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



//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    ['header' => 'Dashboard',],
    [
        'mode' => 'menu',
        'text' => 'Dashboard',
        'url'  => route('dashboard.index'),
        'icon' => 'bi bi-speedometer2',
    ],
    ['header' => 'Usuarios',],
    [
        'mode' => 'menu',
        'text' => 'Usuarios',
        'url'  => '/users',
        'icon' => 'bi bi-person',
    ],
    ['header' => 'Estudiantes',],
    [
        'mode' => 'menu',
        'text' => 'Estudiantes',
        'url'  => '/charts',
        'icon' => 'bi bi-people',
    ],
    ['header' => 'Elecciones'],
    [
        'mode' => 'menu',
        'text' => 'Candidatos',
        'url'  => '/charts',
        'icon' => 'bi bi-person-workspace',
    ],
    [
        'mode' => 'menu',
        'text' => 'Fecha de Electoral',
        'url'  => '/charts',
        'icon' => 'bi bi-calendar-day',
    ],
    ['header' => 'Diseño'],
    [
        'mode' => 'menu',
        'text' => 'Diseño',
        'url'  => '/charts',
        'icon' => 'bi bi-palette',
    ],
];



//ENLACES PARA CSS Y JS html
$linkURL = base_url;

$linksCss = [
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet',
    $linkURL . '/assets/css/light.css',
    $linkURL . '/assets/css/icon/bootstrap-icons.css',
];

$linksScript = [
    $linkURL . '/assets/js/app.js',
    // $linkURL . '/assets/js/settings.js',
];
