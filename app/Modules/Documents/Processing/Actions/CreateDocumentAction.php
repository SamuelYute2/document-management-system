<?php

namespace App\Modules\Documents\Processing\Actions;

use App\Modules\Documents\Data\Repositories\DocumentRepository;
use App\Modules\Employees\Data\Repositories\EmployeeRepository;
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
        $employeeRepository = App::make(EmployeeRepository::class);
        $employee = $employeeRepository->get($data['employee']);

        $documentRepository = App::make(DocumentRepository::class);
        $document = $documentRepository->create($data, $employee);

        $documentRepository->attachDepartments($data, $document);

        return $document;
    }
}
