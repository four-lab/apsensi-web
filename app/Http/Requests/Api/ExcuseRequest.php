<?php

namespace App\Http\Requests\Api;

use App\Exceptions\Api\FailedValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class ExcuseRequest extends FormRequest
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
            'type' => 'required',
            'status' => 'required',
            'description' => 'required|max:225',
            'document' => 'required'
        ];
    }
     protected function failedValidation(Validator $validator)
    {
        return throw new FailedValidation($validator->errors());
    }
}
