<?php

namespace App\Modules\Documents\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the document is authorized to make this request.
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
        return array_merge(config('documents.validation_rules.update', [
            'name' => 'sometimes|string|max:100|unique:documents,name,'.$this->route('document')->id,
        ]));
    }
}
