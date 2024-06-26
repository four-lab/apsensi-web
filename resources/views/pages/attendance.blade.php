<div>
    <x-slot:title>Log Presensi</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Log Presensi</li>
    </x-slot:navigation>

    <div class="card">
        <div class="card-body">
            <ul
                class="nav nav-tabs row"
                role="tablist"
                wire:ignore
            >
                <li class="nav-item col-6 d-flex justify-content-center">
                    <button
                        class="nav-link active px-5"
                        type="button"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#daily-tab"
                    >Log Hari Ini</button>
                </li>
                <li class="nav-item col-6 d-flex justify-content-center">
                    <button
                        class="nav-link px-5"
                        type="button"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#all-tab"
                    >Semua Log</button>
                </li>
            </ul>

            <div class="tab-content">
                <div
                    class="tab-pane fade show active"
                    id="daily-tab"
                    wire:ignore.self
                >
                    <div class="border py-5 rounded mt-4 row justify-content-center">
                        @forelse ($todayAtts as $att)
                            <x-attendance.daily-item :attendance="$att" />
                        @empty
                            <div class="col-md-6">
                                <img
                                    src="{{ asset('/img/illustration-empty-attendance.svg') }}"
                                    alt="Kosong"
                                    width="80%"
                                >
                                <h5 class="mt-3 text-muted text-center">Tidak Terdapat Log Presensi untuk Ditampilkan
                                </h5>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div
                    class="tab-pane fade show py-5"
                    id="all-tab"
                    wire:ignore.self
                >
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="bg-light"><i class="ti ti-align-left me-1 fs-4"></i> Nama Guru</th>
                                    <th class="bg-light"><i class="ti ti-notebook me-1 fs-4"></i> Pelajaran</th>
                                    <th class="bg-light"><i class="ti ti-calendar me-2 fs-4"></i> Tanggal</th>
                                    <th class="bg-light"><i class="ti ti-circle-dot me-2 fs-4"></i> Status</th>
                                    <th class="bg-light"><i class="ti ti-clock-hour-4 me-2 fs-4"></i> Jam Masuk</th>
                                    <th class="bg-light"><i class="ti ti-clock-off me-2 fs-4"></i> Jam Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allAtts as $att)
                                    <tr>
                                        <td>{{ $att->employee->fullname }}</td>
                                        <td>{{ $att->subject->name }}</td>
                                        <td>{{ $att->date->format('d/m/Y') }}</td>
                                        <td>
                                            <x-attendance.status-badge :status="$att->status" />
                                        </td>
                                        <td>{{ $att->time_start ?? '-' }}</td>
                                        <td>{{ $att->time_end ?? '-' }}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td
                                            colspan="6"
                                            class="text-center"
                                        >Tidak ada data untuk ditampilkan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $allAtts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <style>
            .today-attendance {
                overflow: hidden;
            }

            .today-attendance svg {
                position: absolute;
                right: -15px;
                top: -15px;
                width: 20%;
                height: auto;
                opacity: .1;
            }
        </style>
    @endpush

    @push('script')
        <script>
            const channel = pusher.subscribe('attendance');
            channel.bind('attendance-updated', (data) => {
                Livewire.dispatch('refresh');
            })
        </script>
    @endpush
</div>
