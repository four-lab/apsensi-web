<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class EmployeeForm extends Form
{
    public $nik,
        $email,
        $username,
        $password,
        $fullname,
        $birthplace,
        $birthdate,
        $address;

    public Gender $gender = Gender::MALE;

    public $photos = [
        'front' => null,
        'left' => null,
        'right' => null,
    ];

    public function rules(): array
    {
        $rules = [
            'nik' => 'required|min:16|regex:/^[0-9]+$/|unique:employees,nik',
            'email' => 'required|unique:employees,email',
            'username' => 'required|unique:employees,username',
            'password' => 'required',
            'fullname' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required|date',
            'gender' => [
                'required',
                Rule::enum(Gender::class),
            ],
            'address' => 'required',
        ];

        return array_merge($rules, [
            'photos.front' => 'required|image|mimes:jpeg,png,jpg',
            'photos.left' => 'required|image|mimes:jpeg,png,jpg',
            'photos.right' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    }

    public function save()
    {
        $data = $this->validate();
        $photos = $data['photos'];

        $data['password'] = Hash::make($this->password);
        $data['photos'] = [];

        $employee = Employee::create($data);
        $employee->photos = array_map(
            fn ($photo) => $photo->storePublicly("employees/{$employee->id}"),
            $photos
        );
        $employee->update();
    }
}
