<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLegends\PtBrValidator\Rules\FormatoCnpj;
use Illuminate\Support\Facades\Auth;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'nome_fantasia' => 'required','max:50',
                'cnpj_empresa' => ['required','unique:empresas,cnpj_empresa',new FormatoCnpj],
            ],
            'PATCH' => [
                'nome_fantasia' => 'required','max:50',
                'cnpj_empresa' => ['required',new FormatoCnpj]
            ],
        };
    }
}
