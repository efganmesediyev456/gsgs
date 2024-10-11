<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 *
 * @property string email
 * @property string password
 * @property boolean remember
 *
 * @package App\Http\Requests\Admin\Auth
 */
class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }

    public function passedValidation(): void
    {
        $this->remember = !($this->input('remember_me') == null);
    }
}
