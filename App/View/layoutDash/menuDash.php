<?php

// DATOS GENERALES ADMIN
$title = 'AppStack';
$titleShort = 'M';
$mainLink = base_url('/dashboard');
$logoAdmin = '../public/logo/logo.png';

//DATOS DEL USUARIO ADMIN
$userName = session()->user()->name;



//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'My Account',
        'url'  => '#',
        'icon' => 'bi bi-person-circle',
    ],
    [
        'text' => 'Settings',
        'url'  => 'dashboard/logs',
        'icon' => 'bi bi-gear',
    ],
    [
        'text' => 'My Wallet',
        'url'  => base_url('/logout'),
        'icon' => 'bi bi-wallet2',
    ],
    [
        'text' => 'Lock Screen',
        'url'  => '#',
        'icon' => 'bi bi-shield-lock',
    ],
    [
        'text' => 'Logout',
        'url'  => route('logout'),
        'icon' => 'bi bi-box-arrow-right',
    ],
];



//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    ['header' => 'Navegación',],
    [
        'mode' => 'menu',
        'text' => 'Dashboard',
        'url'  => '/',
        'icon' => 'bi bi-speedometer2',
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Usuarios',
        'url'    => '#',
        'icon' => 'bi bi-person-lines-fill',
        'submenu' => [
            [
                'text' => 'Usuarios',
                'url'  => base_url('/pusuarios'),
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Modulos',
                'url'  => base_url('/pmodulos'),
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Roles',
                'url'  => base_url('/proles'),
                'icon' => 'fas fa-circle',
            ],
        ],
    ],
    [
        'mode' => 'menu',
        'text' => 'Productos',
        'url'  => '/users',
        'icon' => 'bi bi-shop',
    ],
    [
        'mode' => 'menu',
        'text' => 'Charts',
        'url'  => '/charts',
        'icon' => 'bi bi-clipboard-data',
    ],
    ['header' => 'Apps'],
    [
        'mode' => 'submenu',
        'text'    => 'Categorias',
        'url'    => '#',
        'icon' => 'bi bi-tags',
        'submenu' => [
            [
                'text' => 'Crear',
                'url'  => 'category/create',
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Editar',
                'url'  => 'category/edit',
                'icon' => 'fas fa-circle',
            ],
        ],
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Productos',
        'url'    => '#',
        'icon' => 'bi bi-shop',
        'submenu' => [
            [
                'text' => 'Crear',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
            [
                'text' => 'Editar',
                'url'  => 'www.google.com',
                'icon' => 'fas fa-circle',
            ],
        ],
    ],

    [
        'header' => 'CLIENTES'
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
];
