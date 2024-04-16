<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EtiquetaRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', Rule::unique(table:'etiquetas', column:'nombre')],
            'categoria' =>['required', 'integer', Rule::unique(table:'etiquetas',column:'id_categoria')] 
        ];
    }

    public function messages():array
    {
        return[
            'name.unique' => __('La equita ya existe')
        ];
    }
}
