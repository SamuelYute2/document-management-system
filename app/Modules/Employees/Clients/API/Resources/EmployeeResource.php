<?php

namespace App\Modules\Employees\Clients\API\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'object' => 'Employee',
            'id' => (int)$this->id,
            'number' => $this->number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'department' => $this->department->id
        ];
    }
}
