<?php

namespace App\Modules\Documents\Clients\API\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected $fillable = [
        'name', 'index', 'url', 'path', 'type'
    ];
    public function toArray($request)
    {
        return [
            'object' => 'Document',
            'id' => (int)$this->id,
            'name' => $this->name,
            'index' => $this->index,
            'download_url' => $this->url,
            'type' => $this->type,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'employee' => $this->employee->id,
        ];
    }
}
