<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFromUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|numeric',
            'company_id' => 'nullable|int'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.string' => 'Поле "Имя" должно состоять из букв',
            'last_name.string' => 'Поле "Фамилия" должно состоять из букв',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'phone_number' => 'Поле "номер телефона" должно стоять из цифр'
        ];
    }
}
