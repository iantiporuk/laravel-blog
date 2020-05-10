<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
            'email' => 'required|email|min:5|max:15',
            'password' => 'required|min:6',
        ];
    }

    /** @inheritDoc */
    public function attributes()
    {
        return [
            'email' => 'e-mail',
        ];
    }

    /** @inheritDoc */
    public function messages()
    {
        return [
            'email.required' => "The email field is required",
        ];
    }
}
