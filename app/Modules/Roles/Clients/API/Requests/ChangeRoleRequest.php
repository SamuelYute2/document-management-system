<?php

namespace App\Modules\Roles\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangeRolePasswordRequest extends FormRequest
{
    /**
     * Determine if the role is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return $this->role()->rolename == Auth::role()->rolename? false:true;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|min:8',
            'password' => 'required|min:8|confirmed'
        ];
    }
}
