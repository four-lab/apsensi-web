<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SchoolPage extends Component
{
    #[Validate('required')]
    public $schoolname;
    public $coordinates = [];

    public function mount()
    {
        $this->schoolname = setting('school.name');
        $this->coordinates = setting('school.coordinates', true, []);
    }

    public function render()
    {
        return view('pages.school');
    }

    public function save()
    {
        $this->validate();

        if (count($this->coordinates) > 0)
            if (end($this->coordinates) != $this->coordinates[0])
                $this->coordinates[] = $this->coordinates[0];

        save_setting('school.name', $this->schoolname);
        save_setting('school.coordinates', $this->coordinates);

        $this->dispatch('swal-s', 'Berhasil menyimpan informasi');
    }

    #[On('add-coordinate')]
    public function addCoordinate($lat, $long)
    {
        $this->coordinates[] = [$lat, $long];
    }
}
