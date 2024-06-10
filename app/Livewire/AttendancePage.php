<?php

namespace App\Livewire;

use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\Component;

class AttendancePage extends Component
{
    public function render()
    {
        $todayAtts = Attendance::where('date', now()->format('Y-m-d'))->get();

        return view('pages.attendance', compact('todayAtts'));
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->render();
    }
}
