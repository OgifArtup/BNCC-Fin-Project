<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|min:3|max:40|unique:users',
            'email' => 'required|email|regex:[gmail.com$]|unique:users',
            'password' => 'required|string|min:6|max:12',
            'nomor' => 'required|string|regex:[^08]|unique:users',
        ];
    }
}
