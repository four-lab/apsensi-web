<?php

namespace App\Services;

use App\Enums\AttendanceStatus;
use App\Exceptions\AttendanceException;
use App\Models\Employee;
use App\Repos\AttendanceRepository;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Location\Coordinate;
use Location\Polygon;

class AttendanceService
{
    public function attempt(Employee $employee, ?UploadedFile $file)
    {
        $status  = (new AttendanceRepository)->getStatus($employee);
        $attStatus = AttendanceStatus::PRESENT;
        $attendance = $status->attendance;

        if (!$status->canAttempt)
            throw new AttendanceException('Tidak terdapat jadwal aktif');

        if (!$status->alreadyScanned && !$file)
            throw new AttendanceException('Wajah belum discan');

        if (!$status->alreadyScanned)
            $this->verifyFace($employee, $file);

        $startTime = Carbon::createFromFormat('H:i:s', $attendance->subject_start);

        if (now()->diffInMinutes($startTime) > $attendance->subject->max_lateness)
            $attStatus = AttendanceStatus::LATE;

        if ($attendance->time_start) {
            $minutePassed = now()->diffInMinutes(
                Carbon::createFromFormat('H:i:s', $attendance->time_start)
            );

            if ($minutePassed < 10)
                throw new AttendanceException('Presensi belum dapat diakhiri');

            $attendance->update(['time_end' => date('H:i:s')]);
            return;
        }

        $attendance->update([
            'time_start' => date('H:i:s'),
            'status' => $attStatus,
        ]);
    }

    public function validArea(string $latitude, string $longitude): bool
    {
        $coordinates = setting('school.coordinates', true) ?? [];
        $geofence = new Polygon();

        array_map(function ($coord) use ($geofence) {
            $geofence->addPoint(new Coordinate($coord[0], $coord[1]));
        }, $coordinates);

        return $geofence->contains(new Coordinate($latitude, $longitude));
    }

    private function verifyFace(Employee $employee, UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();
        $res = Http::attach('image', file_get_contents($file), $filename)
            ->post(config('app.ai_url') . '/recognize');

        if (!$res->ok())
            throw new AttendanceException('Terjadi kesalahan saat mendeteksi wajah');

        $data = $res->object();

        if (($data->status ?? false) != 'ok')
            throw new AttendanceException('Wajah tidak dapat dikenali');

        if ($data->employee != $employee->id)
            throw new AttendanceException('Wajah tidak sesuai');
    }
}
