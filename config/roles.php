<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|max:20|unique:roles'
        ],

        'update' => [

        ],

    ]

];
