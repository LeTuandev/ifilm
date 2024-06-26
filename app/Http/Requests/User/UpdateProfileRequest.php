<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'email không được để trống',
            'email.email' => 'email không đúng định dạng',
            'email.regex' => 'email phải có @gmail',
        ];
    }
}
