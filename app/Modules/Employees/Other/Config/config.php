<?php

return [

    'validation_rules' => [

        'store' => [
            'number' => 'required|string|max:20|unique:employees',
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|string|max:50|unique:employees',
            'avatar' => 'sometimes|image|mimes:jpg,png',
            'department' => 'required|numeric|exists:departments,id'
        ],

        'update' => [
            'first_name' => 'sometimes|string|max:20',
            'last_name' => 'sometimes|string|max:20',
            'avatar' => 'sometimes|image|mimes:jpg,png',
            'department' => 'sometimes|numeric|exists:departments,id'
        ],

    ]

];
