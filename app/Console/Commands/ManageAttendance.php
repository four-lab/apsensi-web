<?php

namespace App\Console\Commands;

use App\Events\AttendanceEvent;
use App\Repos\AttendanceRepository;
use Illuminate\Console\Command;

class ManageAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage-attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage attendance record';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = date('Y-m-d');
        $repo = new AttendanceRepository();

        $repo->insertDaily($date);
        $repo->makeAbsent($date);
        $repo->makeExcused($date);
        $repo->endUnfinished($date);

        AttendanceEvent::dispatch();
    }
}
