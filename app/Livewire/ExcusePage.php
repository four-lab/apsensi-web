<?php

namespace App\Livewire;

use App\Enums\ExcuseStatus;
use App\Models\Excuse;
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
        $this->excuse->update([
            'status' => ExcuseStatus::ACCEPTED,
        ]);

        $this->dispatch('hide-modal');
        $this->dispatch('swal-s', 'Berhasil menerima cuti');
    }

    public function rejectExcuse()
    {
        $this->excuse->update([
            'status' => ExcuseStatus::REJECTED,
        ]);

        $this->dispatch('hide-modal');
        $this->dispatch('swal-s', 'Berhasil menolak cuti');
    }

    #[On('excuse-cleared')]
    public function clearExcuse()
    {
        $this->excuse = null;
    }
}
