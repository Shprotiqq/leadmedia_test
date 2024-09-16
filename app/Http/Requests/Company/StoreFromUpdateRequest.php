<?php

namespace App\Http\Requests\Company;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFromUpdateRequest extends FormRequest
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
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'logo_path' => 'nullable|image',
            'url' => 'nullable|url'
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Поле "Имя" должно включать в себя имя',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'logo_path.image' => 'Вы не прикрепили файл',
            'url.url' => 'Поле "Адрес сайта" должно включать в себя url сайта',
        ];
    }
}
