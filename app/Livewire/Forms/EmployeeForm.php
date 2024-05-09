<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use App\Models\Employee;
use App\Repos\EmployeeRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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

    public ?Employee $employee = null;
    public Gender $gender = Gender::MALE;

    public $photos = [
        'front' => null,
        'left' => null,
        'right' => null,
    ];

    public function rules(): array
    {
        $rules = [
            'fullname' => 'required|regex:/^[\p{L}\s\']+$/u',
            'birthplace' => 'required|alpha',
            'birthdate' => 'required|date',
            'address' => 'required',
            'nik' => [
                'required',
                'digits:16',
                'regex:/^[0-9]+$/',
                Rule::unique('employees', 'nik')->ignore($this->employee),
            ],
            'email' => [
                'required',
                Rule::unique('employees', 'email')->ignore($this->employee),
            ],
            'username' => [
                'required',
                'regex:/^[\w.]+$/',
                Rule::unique('employees', 'username')->ignore($this->employee),
            ],
            'gender' => [
                'required',
                Rule::enum(Gender::class),
            ],
        ];

        if (!$this->employee)
            return array_merge($rules, [
                'password' => 'required|min:8',
                'photos.front' => 'required|image|mimes:jpeg,png,jpg',
                'photos.left' => 'required|image|mimes:jpeg,png,jpg',
                'photos.right' => 'required|image|mimes:jpeg,png,jpg',
            ]);

        return array_merge($rules, [
            'photos.front' => 'required',
            'photos.left' => 'required',
            'photos.right' => 'required',
        ]);
    }

    public function setEmployee(Employee $employee)
    {
        $this->fill($employee->only(['nik', 'email', 'username', 'fullname', 'birthplace', 'gender', 'address']));

        $this->employee = $employee;
        $this->birthdate = $employee->birthdate->format('Y-m-d');
        $this->photos = (array) $employee->photos;
    }

    public function save()
    {
        $data = $this->validate();

        if (!$this->employee || !is_null($this->password))
            $data['password'] = Hash::make($this->password);

        (is_null($this->employee)) ?
            EmployeeRepository::create($data, $this->photos) :
            EmployeeRepository::update($this->employee, $data, $this->photos);

        $this->reset();
    }
}
