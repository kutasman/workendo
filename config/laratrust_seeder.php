<?php

return [
    'role_structure' => [
        'superadmin' => [
            'user' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
	        'company' => 'c,r,u,d',
	        'shift' => 'c,r,u,d'
        ],
        'admin' => [
            'user' => 'c,r,u,d',
            'profile' => 'r,u',
	        'company' => 'c,r,u,d',
	        'shift' => 'c,r,u,d'
        ],
        'user' => [
            'profile' => 'r,u',
	        'company' => 'r',
	        'shift' => 'c,r,u,d'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
