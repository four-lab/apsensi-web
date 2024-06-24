<?php

namespace App\Livewire;

use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AttendancePage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $todayAtts = Attendance::where('date', now()->format('Y-m-d'))->get();
        $allAtts = Attendance::with('employee', 'subject')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.attendance', compact('todayAtts', 'allAtts'));
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->render();
    }
}
