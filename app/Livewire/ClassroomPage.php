<?php

namespace App\Livewire;

use App\Livewire\Forms\ClassroomForm;
use App\Models\Classroom;
use Livewire\Attributes\On;
use Livewire\Component;

class ClassroomPage extends Component
{
    public ClassroomForm $form;

    public function render()
    {
        return view('pages.classroom.index');
    }

    public function edit($id)
    {
        $this->form->setClassroom(Classroom::findOrFail($id));
        $this->dispatch('show-modal');
    }

    public function save()
    {
        $classroom = $this->form->classroom;
        $this->form->save();

        $this->dispatch('classroom-saved');
        $this->dispatch('swal-s', $classroom ?
            'Berhasil mengubah kelas' : 'Berhasil menambahkan kelas');
    }

    #[On('classroom-cleared')]
    public function clear()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('classroom-delete')]
    public function delete($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        $this->dispatch('swal-s', 'Berhasil menghapus kelas');
        $this->dispatch('classroom-saved');
    }
}
