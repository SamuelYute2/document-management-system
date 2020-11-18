<?php

namespace App\Modules\Employees\Processing\Tasks;

class GenerateRandomEmployeePasswordTask
{
    public function run()
    {
        return strtoupper(str_shuffle(bin2hex(openssl_random_pseudo_bytes(4))));
    }
}
