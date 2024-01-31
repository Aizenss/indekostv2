<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    public function authorize()
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
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'new_password_confirm' => ['required','same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal 8 karakter.',
            'new_password_confirm.same' => 'Konfirmasi password baru tidak cocok.',
            'new_password_confirm.required' => 'Konfirmasi password baru wajib diisi.',
        ];
    }
}
