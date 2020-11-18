<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|exists:documents',
            'index' => 'sometimes|string|exists:documents',
            'type' => 'required|string|exists:documents'
        ],

        'update' => [
            'index' => 'sometimes|string|exists:documents',
            'type' => 'so|string|exists:documents'
        ],
    ]
];
