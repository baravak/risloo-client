<?php
return [
    'defaults' => [
        'guard' => 'auth'
    ],
    'guards' => [
        'auth' => [
            'driver' => 'auth'
        ],
        'force' => [
            'driver' => 'auth'
        ],
    ]
];
