<?php

namespace App\Modules\Documents;

use App\Modules\Documents\Data\Repositories\DocumentRepository;
use App\Modules\Documents\Clients\API\Resources\DocumentResource;
use Illuminate\Support\Facades\App;

class Documents {

    public static function repository()
    {
        return App::make(DocumentRepository::class);
    }

    public static function resource($document)
    {
      return new DocumentResource($document);
    }

    public static function resourceCollection($documents)
    {
      return DocumentResource::collection($documents);
    }

}
