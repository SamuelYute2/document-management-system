<?php

namespace App\Modules\Documents\Data\Repositories;

use App\Modules\Departments\Data\Models\Department;
use App\Modules\Documents\Data\Models\Document;
use App\Modules\Employees\Data\Models\Employee;

class DocumentRepository {

    public function getAll()
    {
        return Document::all();
    }

    public function get($id)
    {
        return Document::find($id);
    }

    public function create($data, Employee $employee)
    {
        $document = new Document;
        $document->fill($data);

        $document->employee()->associate($employee);

        $document->save();

        return $document;
    }

    public function update($data, Document $document)
    {
        $document->update($data);

        return $document;
    }

    public function delete(Document $document)
    {
        return $document->delete();
    }

    public function attachDepartments($data, Document $document)
    {
        return $document->departments()->syncWithoutDetaching($data['departments']);
    }

    public function detachDepartments($data, Document $document)
    {
        return $document->departments()->detach($data['departments']);
    }

    public function attachVersion(Document $document, Document $newDocument)
    {
        return $document->versions()->syncWithoutDetaching([$newDocument->id]);
    }

    public function detachVersion(Document $document, Document $newDocument)
    {
        return $document->versions()->detach([$newDocument->id]);
    }
}
