<?php

namespace App\Modules\Documents\Processing\Actions;

use App\Modules\Documents\Data\Repositories\DocumentRepository;
use Illuminate\Support\Facades\App;

/**
 * Class CreateDocumentAction
 *
 * Action Creates a New Document from the Document name parameter.
 * The New Document has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Documents\Processing\Actions
 */

class CreateDocumentAction
{
    public function run($data)
    {
        return App::make(DocumentRepository::class)->create($data);
    }
}
