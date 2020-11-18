<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|exists:departments'
        ],

        'update' => [

        ],

    ]

];
