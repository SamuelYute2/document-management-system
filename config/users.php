<?php

return [

    'validation_rules' => [

        'store' => [
            'username' => 'required|string|max:20|unique:users',
            'employee' => 'required|numeric|exists:employees,id|unique:users,employee_id'
        ],

        'update' => [

        ],

    ]

];
