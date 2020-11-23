<?php

namespace App\Modules\Roles\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachRoleDocumentsRequest extends FormRequest
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
        return config('roles.validation_rules.documents.attach');
    }
}
