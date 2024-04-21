<?php

namespace App\Livewire;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
use App\Repos\EmployeeRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeePage extends Component
{
    use WithFileUploads;

    public EmployeeForm $form;

    public function render()
    {
        return view('pages.employee.index');
    }

    public function updated($prop)
    {
        $rules = [
            'photos.front' => 'required|image|mimes:jpeg,png,jpg',
            'photos.left' => 'required|image|mimes:jpeg,png,jpg',
            'photos.right' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $this->validateOnly($prop, $rules);
    }

    public function save()
    {
        $employee = $this->form->employee;
        $this->form->save();

        $this->dispatch('employee-saved');
        $this->dispatch('swal-s', $employee ?
            'Berhasil mengubah pegawai' : 'Berhasil menambahkan pegawai');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $this->form->setEmployee($employee);
        $this->dispatch('show-modal');
    }

    #[On('employee-cleared')]
    public function clear()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('employee-delete')]
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        EmployeeRepository::delete($employee);

        $this->dispatch('swal-s', 'Berhasil menghapus pegawai');
        $this->dispatch('employee-saved');
    }
}
