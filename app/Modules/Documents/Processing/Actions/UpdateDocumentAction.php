<?php

namespace App\Modules\Documents\Processing\Actions;

use App\Modules\Documents\Data\Models\Document;

class UpdateDocumentAction
{
    public function run($data, Document $document)
    {
        $document->update($data);

        return $document;
    }
}
