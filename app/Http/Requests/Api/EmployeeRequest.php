<?php

namespace App\Http\Requests\Api;

use App\Exceptions\Api\FailedValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullname' => 'required|regex:/^[\p{L}\s\']+$/u',
            'birthplace' => 'required|alpha',
            'birthdate' => 'required|date',
            'address' => 'required',
            'email' => [
                'required',
                Rule::unique('employees', 'email')->ignore($this->email, 'email'),
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return throw new FailedValidation($validator->errors());
    }
}
