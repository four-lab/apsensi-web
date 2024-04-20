<?php

namespace App\Livewire;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
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
        $this->validateOnly($prop);
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
}
