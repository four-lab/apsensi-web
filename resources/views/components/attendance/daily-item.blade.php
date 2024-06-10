<div class="col-md-4">
    <div
        class="card today-attendance attendance-item"
        style="cursor: pointer;"
    >
        <x-attendance.status-icon :status="$attendance->status" />

        <div class="card-body">
            <h5>{{ $attendance->employee->fullname }}</h5>
            <x-attendance.status-badge :status="$attendance->status" />

            <div class="d-flex mt-3 border-top pt-2">
                <span>
                    <i class="ti ti-clock"></i>
                    <small>
                        {{ $attendance->startAttendanceTime->format('H:i') }} -
                        {{ $attendance->endAttendanceTime->format('H:i') }}
                    </small>
                </span>
                <span class="ms-4">
                    <i class="ti ti-notebook"></i>
                    <small>{{ $attendance->subject->name }}</small>
                </span>
            </div>
        </div>
    </div>
</div>
