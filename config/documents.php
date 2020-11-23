<?php

return [

    'validation_rules' => [

        'store' => [
            'name' => 'required|string|max:150|unique:documents',
            'index' => 'sometimes|string',
            'type' => 'required|numeric|min:1|max:5',
            'departments' => 'required|filled|array',
            'departments.*' => 'numeric|exists:departments,id',
            'employee' => 'required|numeric|exists:employees,id'
        ],

        'update' => [
            'index' => 'sometimes|string',
            'type' => 'sometimes|numeric|min:1|max:5'
        ],

        'departments' => [
            'attach' => [
                'departments' => 'required|filled|array',
                'departments.*' => 'exists:departments,id',
            ],
            'detach' => [
                'departments' => 'required|filled|array',
                'departments.*' => 'exists:departments,id'
            ]
        ]
    ]
];
