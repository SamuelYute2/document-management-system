<?php

namespace App\Modules\Employees\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the employee is authorized to make this request.
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
        return array_merge(config('employees.validation_rules.update', [
            'number' => 'sometimes|string|max:20|unique:employees,number,'.$this->route('employee')->id,
            'email' => 'sometimes|string|max:50|unique:employees,email,'.$this->route('employee')->id,
        ]));
    }
}
