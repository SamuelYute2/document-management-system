<?php

namespace App\Modules\Documents\Processing\Actions;

use App\Modules\Documents\Data\Models\Document;

class DeleteDocumentAction
{
    public function run(Document $document)
    {
        return $document->delete();
    }
}
