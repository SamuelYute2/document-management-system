<?php

namespace App\Modules\Documents\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departments\Departments;
use App\Modules\Documents\Clients\API\Requests\StoreDocumentRequest;
use App\Modules\Documents\Clients\API\Requests\UpdateDocumentRequest;
use App\Modules\Documents\Clients\API\Resources\DocumentResource;
use App\Modules\Employees\Employees;
use Illuminate\Support\Facades\App;

use App\Modules\Documents\Data\Models\Document;

use App\Modules\Documents\Processing\Actions\CreateDocumentAction;
use App\Modules\Documents\Processing\Actions\DeleteDocumentAction;
use App\Modules\Documents\Processing\Actions\GetAllDocumentsAction;
use App\Modules\Documents\Processing\Actions\UpdateDocumentAction;


class DocumentAPIController extends  Controller
{
    public function getAll()
    {
        return DocumentResource::collection(App::make(GetAllDocumentsAction::class)->run());
    }

    public function get(Document $document)
    {
        return new DocumentResource($document);
    }

    public function store(StoreDocumentRequest $request)
    {
        return new DocumentResource(App::make(CreateDocumentAction::class)->run($request->all()));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        return new DocumentResource(App::make(UpdateDocumentAction::class)->run($request->all(), $document));
    }

    public function delete(Document $document)
    {
        App::make(DeleteDocumentAction::class)->run($document);

        return response('Success',204);
    }

    public function getEmployee(Document $document)
    {
        return Employees::resource($document->employee);
    }

    public function getDepartments(Document $document)
    {
        return Departments::resourceCollection($document->departments);
    }

    public function getVersions(Document $document)
    {
        return DocumentResource::collection($document->versions);
    }
}
