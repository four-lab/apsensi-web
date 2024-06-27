<?php

namespace App\Livewire;

use App\Enums\ExcuseStatus;
use App\Models\Excuse;
use App\Repos\ExcusesRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ExcusePage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $excuse = null;

    public function render()
    {
        $excuses = Excuse::with('employee')->paginate(10);

        return view('pages.excuse', compact('excuses'));
    }

    public function showDetail($id)
    {
        $this->excuse = Excuse::find($id);
        $this->dispatch('show-excuse');
    }

    public function confirmExcuse()
    {
        ExcusesRepository::confirm($this->excuse);

        $this->dispatch('hide-modal');
        $this->dispatch('swal-s', 'Berhasil menerima cuti');
    }

    public function rejectExcuse()
    {
        ExcusesRepository::reject($this->excuse);

        $this->dispatch('hide-modal');
        $this->dispatch('swal-s', 'Berhasil menolak cuti');
    }

    #[On('excuse-cleared')]
    public function clearExcuse()
    {
        $this->excuse = null;
    }
}
