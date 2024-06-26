<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
            'email' => 'required|email|max:255|regex:/(.*)@gmail\.com/i',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu phải có ít nhất một chữ cái viết hoa, một ký tự !$#%@ và một số',
            'email.required' => 'email không được để trống',
            'email.email' => 'email không đúng định dạng',
            'email.regex' => 'email phải có @gmail',
        ];   
    }
}
