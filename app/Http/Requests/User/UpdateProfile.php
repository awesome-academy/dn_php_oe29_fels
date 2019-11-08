<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
        return [
            'avatar' => 'bail|file|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
        ];
    }
}
