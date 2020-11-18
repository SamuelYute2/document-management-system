<?php

namespace App\Modules\Documents\Processing\Actions;

use App\Modules\Documents\Data\Models\Document;

class GetAllDocumentsAction
{
    public function run()
    {
        return Document::all();
    }
}
