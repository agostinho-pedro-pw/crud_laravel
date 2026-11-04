<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //definindo os campos required
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2',
            'description' => 'required|min:2|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            //definindo os campos obrigatorios e as mensagens de erro!
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'Este campo é necessário',
            'email.email' => 'Este campo deve conter um email valido',
            'email.unique' => 'já foi regristado um user com esse email',
            'password.required' => ' Este campo é obrigatorio',
            'password.min' => 'Este campo deve conter no minimo :min caracteres',
            'description.required' => ' Este campo é obrigatório',
            'description.min' => 'Este campo deve conter no minimo :min caracteres',
            'description.max' => 'Este campo deve conter no maximo :max caracteres',
        ];
    }
}
