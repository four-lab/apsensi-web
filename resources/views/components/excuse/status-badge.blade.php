@php
    use App\Enums\ExcuseStatus;
@endphp

@if ($status == ExcuseStatus::ACCEPTED)
    <div class="badge bg-success-subtle text-success">Disetujui</div>
@endif

@if ($status == ExcuseStatus::REJECTED)
    <div class="badge bg-danger-subtle text-danger">Ditolak</div>
@endif

@if ($status == ExcuseStatus::PENDING)
    <div class="badge bg-primary-subtle text-primary">Pending</div>
@endif
