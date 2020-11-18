<?php

namespace App\Modules\Users\Processing\Tasks;

class GenerateRandomUserPasswordTask
{
    public function run()
    {
        return strtoupper(str_shuffle(bin2hex(openssl_random_pseudo_bytes(4))));
    }
}
