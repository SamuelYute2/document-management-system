<?php

namespace App\Modules\Users\Clients\API\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'object' => 'User',
            'id' => (int)$this->id,
            'username' => $this->username,
            'status' => (int)$this->status,
            'administrator' => (int)$this->administrator,
            'last_login' => (string)$this->last_login,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'employee' => (int)$this->employee->id
        ];
    }
}
