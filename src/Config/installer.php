<?php

return [
    'php' => '8.0.0',

    'database' => [
        'seeders' => false
    ],

    'install_commands' => [
        'install:create-default-languages',
        'install:create-default-user-roles',
        'install:create-default-users',
        'install:create-settings-keys'
    ]
];
