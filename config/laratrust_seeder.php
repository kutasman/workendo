<?php

return [
    'role_structure' => [
        'superadmin' => [
            'user' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
	        'company' => 'c,r,u,d',
	        'shift' => 'c,r,u,d',
	        'income' => 'c,r,u,d',
	        'income-types' => 'c,r,u,d'
        ],
        'admin' => [
            'user' => 'c,r,u,d',
            'profile' => 'r,u',
	        'company' => 'c,r,u,d',
	        'shift' => 'c,r,u,d',
            'income' => 'c,r,u,d',
            'income-types' => 'r'

        ],
        'user' => [
            'profile' => 'r,u',
            'company' => 'c,r,u,d',
            'shift' => 'c,r,u,d',
            'income' => 'c,r,u,d',
            'income-types' => 'r'

        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
