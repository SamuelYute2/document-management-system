<?php

namespace App\Modules\Departments\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the department is authorized to make this request.
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
        return array_merge(config('departments.validation_rules.update', [
            'number' => 'sometimes|string|max:20|unique:departments,number,'.$this->route('department')->id,
            'email' => 'sometimes|string|max:20|unique:departments,email,'.$this->route('department')->id,
        ]));
    }
}
