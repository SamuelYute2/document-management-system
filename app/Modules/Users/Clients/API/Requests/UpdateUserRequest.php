<?php

namespace App\Modules\Users\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
        return array_merge(config('users.validation_rules.update'), [
            'username' => 'required|string|max:20|unique:users,username,'.$this->route('user')->id
        ]);
    }
}
