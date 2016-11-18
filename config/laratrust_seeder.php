<?php

return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
	        'places' => 'c,r,u,d',
	        'shifts' => 'c,r,u,d'
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
	        'places' => 'c,r,u,d',
	        'shifts' => 'c,r,u,d'
        ],
        'user' => [
            'profile' => 'r,u',
	        'places' => 'r',
	        'shifts' => 'c,r,u,d'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
