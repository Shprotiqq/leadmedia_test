<?php

namespace App\Http\Requests\Company;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFromCreateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'nullable|email|unique:companies',
            'logo_path' => 'nullable|image',
            'url' => 'nullable|url'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'email' => 'Компания с таким e-mail уже есть в списке',
            'logo_path' => 'Вы не прикрепили файл',
            'url.url' => 'Поле "Адрес сайта" должно включать в себя url сайта',
        ];
    }
}
