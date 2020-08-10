<?php
return [
    'types' => [
        'admin' => [
            'icon' => 'far fa-users-crown'
        ],
        'counseling_center' => [
            'icon' => 'far fa-hospital-alt'
        ],
        // 'manager' => [
        //     'icon' => 'fal fa-users-cog'
        // ],
        'operator' => [
            'icon' => 'fal fa-user-headset'
        ],
        'psychologist' => [
            'icon' => 'fal fa-user-tie'
        ],
        'client' => [
            'icon' => 'far fa-user-shield'
        ]
    ],

    'room_managers' => ['manager', 'operator', 'psychologist', 'under_supervision']
];
