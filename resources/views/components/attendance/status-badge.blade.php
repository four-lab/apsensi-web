@php
    use App\Enums\AttendanceStatus;
@endphp

@if ($status == AttendanceStatus::PRESENT)
    <div class="badge bg-success-subtle text-success">Hadir</div>
@endif

@if ($status == AttendanceStatus::ABSENT)
    <div class="badge bg-danger-subtle text-danger">Absen</div>
@endif

@if ($status == AttendanceStatus::LATE)
    <div class="badge bg-warning-subtle text-warning">Terlambat</div>
@endif

@if ($status == AttendanceStatus::EXCUSED)
    <div class="badge bg-primary-subtle text-primary">Izin</div>
@endif

@if ($status == null)
    <div class="badge bg-secondary-subtle text-secondary">Belum Presensi</div>
@endif
