<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|unique:departments'
        ],

        'update' => [

        ],

    ]

];
