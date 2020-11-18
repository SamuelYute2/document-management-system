<?php

return [

    'validation_rules' => [

        'store' => [
            'username' => 'required|string|max:20|unique:users'
        ],

        'update' => [

        ],

    ]

];
