<div>
    <x-slot:title>Jadwal Pelajaran</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Jadwal</li>
    </x-slot:navigation>

    <div class="card">
        <div class="card-body">
            <div class="row align-items-end justify-content-center gap-2 mb-4">
                <div class="col-md-8">
                    <label
                        for="classroom"
                        class="mb-2"
                    >JADWAL KELAS</label>

                    <select
                        class="form-control"
                        wire:model.change="classId"
                    >
                        @foreach ($this->classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 text-center">
                    <button
                        class="btn btn-primary"
                        wire:click="create"
                    >
                        <i class="fas fa-clipboard-list me-1"></i> Atur Jadwal
                    </button>
                </div>
            </div>

            <div class="table-responsive mt-4 pt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jum'at</th>
                            <th>Sabtu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($this->schedules as $schedule)
                                <td class="p-1">
                                    @foreach ($schedule as $sch)
                                        <div class="bg-light-primary text-black px-2 py-2 schedule-content">
                                            <small class="schedule-time">
                                                {{ $sch->time_start }} - {{ $sch->time_end }}
                                            </small>
                                            <p class="fw-bold m-0 fs-4">{{ $sch->subject->name }}</p>
                                            <small>{{ $sch->employee->fullname }}</small>
                                        </div>
                                    @endforeach

                                    @if (count($schedule) < 1)
                                        <div
                                            class="d-flex align-items-center justify-content-center"
                                            style="padding-top: 50%; padding-bottom: 50%;"
                                        >
                                            <small class="text-center">Tidak ada jadwal<small>
                                        </div>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('style')
        <style>
            .schedule-content {
                border-bottom: 6px solid #dee6ff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-bottom: .75em;
            }

            .schedule-content .schedule-time {
                font-size: .85em;
                word-spacing: .5em;
            }
        </style>
    @endpush
</div>
