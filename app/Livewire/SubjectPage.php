<?php

namespace App\Livewire;

use App\Livewire\Forms\SubjectForm;
use App\Models\Subject;
use Livewire\Attributes\On;
use Livewire\Component;

class SubjectPage extends Component
{
    public SubjectForm $form;

    public function render()
    {
        return view('pages.subject.index');
    }

    public function edit($id)
    {
        $this->form->setSubject(Subject::findOrFail($id));
        $this->dispatch('show-modal');
    }

    public function save()
    {
        $subject = $this->form->subject;
        $this->form->save();

        $this->dispatch('subject-saved');
        $this->dispatch('swal-s', $subject ?
            'Berhasil mengubah mapel' : 'Berhasil menambahkan mapel');
    }

    #[On('subject-cleared')]
    public function clear()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('subject-delete')]
    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        $this->dispatch('swal-s', 'Berhasil menghapus mapel');
        $this->dispatch('subject-saved');
    }
}
