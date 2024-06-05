<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repos\AttendanceRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    use ApiResponser;

    private AttendanceRepository $attRepo;

    public function __construct()
    {
        $this->attRepo = new AttendanceRepository;
    }

    public function status(Request $request)
    {
        return $this->success(
            $this->attRepo->getStatus($request->user())
        );
    }
}
