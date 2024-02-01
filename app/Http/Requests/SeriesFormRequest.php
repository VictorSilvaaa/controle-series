<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome'=> ['required', 'min:2'],
            
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min'=> 'o campo nome precisa de pelo menos :min caracteres'
        ];
    }
}
