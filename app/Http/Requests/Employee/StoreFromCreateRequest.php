<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StoreFromCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email|unique:employees',
            'phone_number' => 'nullable|numeric|unique:employees',
            'company_id' => 'nullable|exists:companies,id'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения',
            'last_name.required' => 'Поле "Фамилия" обязательно для заполнения',
            'email.unique' => 'Сотрудник с таким e-mail уже существует',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'phone_number.unique' => 'Этот номер телефона уже указан у другого сотрудника',
            'phone_number.numeric' =>'Поле "Номер телефона"должно состоять из цифр'
        ];
    }
}
