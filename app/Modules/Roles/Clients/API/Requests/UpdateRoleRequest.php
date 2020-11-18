<?php

namespace App\Modules\Roles\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the role is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(config('roles.validation_rules.update'), [
            'name' => 'required|string|max:20|unique:roles,name,'.$this->route('role')->id
        ]);
    }
}
