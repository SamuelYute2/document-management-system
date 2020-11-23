<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|max:20|unique:roles'
        ],

        'update' => [

        ],

        'employees' => [
            'attach' => [
                'employees' => 'required|array',
                'employees.*' => 'exists:employees,id'
            ],
            'detach' => [
                'employees' => 'required|array',
                'employees.*' => 'exists:employees,id'
            ]
        ],

        'documents' => [
            'attach' => [
                'documents' => 'required|array',
                'documents.*.id' => 'exists:documents,id',
                'documents.*.permission' => 'numeric|min:1|max:2'
            ],
            'detach' => [
                'documents' => 'required|array',
                'documents.*' => 'exists:documents,id'
            ],
            'change-permission' => [
                'document' => 'required|numeric|exists:documents,id',
                'permission' => 'required|numeric|min:1|max:2'
            ]
        ]

    ]

];
