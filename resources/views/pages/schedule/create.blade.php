<div>
    <x-slot:title>Manajemen Jadwal Kelas {{ $this->classroom->name }}</x-slot:title>
    <x-slot:navigation>
        <li class="breadcrumb-item">
            <a
                href="{{ route('schedules') }}"
                class="text-muted"
            >Jadwal</a>
        </li>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Manajemen</li>
    </x-slot:navigation>

    <div class="card">
        <div class="card-body">
            <ul
                class="nav nav-tabs d-flex justify-content-between"
                role="tablist"
                wire:ignore
            >
                <li class="nav-item">
                    <button
                        class="nav-link active px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(1)"
                    >Senin</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(2)"
                    >Selasa</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(3)"
                    >Rabu</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(4)"
                    >Kamis</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(5)"
                    >Jumat</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  px-5 btn-day"
                        data-bs-toggle="tab"
                        type="button"
                        role="tab"
                        wire:click="setDay(6)"
                    >Sabtu</button>
                </li>
            </ul>
        </div>
    </div>

    <div
        class="card"
        id="schedule-container"
    >
        <div class="card-body">
            @if ($schedules->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jam Mulai</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru Pengajar</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->time_start }}</td>
                                    <td>{{ $schedule->subject->name }}</td>
                                    <td>{{ $schedule->employee->fullname }}</td>
                                    <td>{{ $schedule->time_end }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-danger btn-del"
                                            data-id="{{ $schedule->id }}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <button
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#schedule-modal"
                    >
                        <div class="fas fa-plus me-1"></div> Tambah Jadwal
                    </button>
                </div>
            @else
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img
                        id="empty-schedule-img"
                        src="{{ asset('img/empty-schedule.svg') }}"
                        alt="Empty"
                    >
                    <h4 class="mt-2">Jadwal Masih Kosong</h4>
                    <button
                        class="btn btn-outline-primary mt-1"
                        data-bs-toggle="modal"
                        data-bs-target="#schedule-modal"
                    >
                        <i class="fas fa-plus me-1"></i> Buat Jadwal
                    </button>
                </div>
            @endif
        </div>
    </div>

    @include('pages.schedule.modal')

    @push('style')
        <style>
            #empty-schedule-img {
                width: 35%;
            }

            @media (max-width: 575.98px) {
                #empty-schedule-img {
                    width: 100%;
                }
            }
        </style>
    @endpush

    @push('script')
        <script>
            const modalElement = document.getElementById('schedule-modal');
            const modal = new bootstrap.Modal(modalElement);

            $('#schedule-container').on('click', '.btn-del', function() {
                showConfirmation('Data tidak dapat dikembalikan', () => {
                    Livewire.dispatch('schedule-delete', {
                        id: $(this).data('id'),
                    });
                });
            });

            Livewire.on('schedule-saved', function() {
                modal.hide();
            });

            modalElement.addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('schedule-cleared');
            });
        </script>
    @endpush
</div>
