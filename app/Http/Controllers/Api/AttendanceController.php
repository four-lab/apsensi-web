<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AttendanceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AttendanceRequest;
use App\Repos\AttendanceRepository;
use App\Services\AttendanceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    use ApiResponser;

    private AttendanceRepository $attRepo;
    private AttendanceService $attService;

    public function __construct()
    {
        $this->attRepo = new AttendanceRepository;
        $this->attService = new AttendanceService;
    }

    public function status(Request $request)
    {
        return $this->success(
            $this->attRepo->getStatus($request->user())
        );
    }

    public function validArea(AttendanceRequest $request)
    {
        $isValid = $this->attService->validArea(
            $request->latitude,
            $request->longitude
        );

        return $this->success(compact('isValid'));
    }

    public function attempt(AttendanceRequest $request)
    {
        if (!$this->attService->validArea($request->latitude, $request->longitude))
            return $this->error(message: 'Anda berada di luar area');

        try {
            $this->attService->attempt($request->user(), $request->file('image'));
            return $this->success(message: 'Presensi Berhasil dilakukan');
        } catch (AttendanceException $e) {
            return $this->error(message: $e->getMessage(), code: 401);
        }
    }
}
