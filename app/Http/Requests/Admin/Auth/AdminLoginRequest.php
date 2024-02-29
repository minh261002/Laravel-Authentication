<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => ['email', 'required'],
            'password' => ['required']
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email Không Được Để Trống',
            'email.email' => 'Email Không Hợp Lệ',
            'password.required' => 'Mật Khẩu Không Được Để Trống'
        ];
    }
}