<div>
    <x-slot:title>Perizinan</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Perizinan</li>
    </x-slot:navigation>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-light">
                                <i class="ti ti-align-left me-1 fs-4"></i> Nama Guru
                            </th>
                            <th class="bg-light">
                                <i class="ti ti-calendar-due me-1 fs-4"></i> Tanggal Mulai
                            </th>
                            <th class="bg-light">
                                <i class="ti ti-calendar-minus me-1 fs-4"></i> Tanggal Akhir
                            </th>
                            <th class="bg-light">
                                <i class="ti ti-circle-dot me-1 fs-4"></i> Status
                            </th>
                            <th class="bg-light">
                                <i class="ti ti-time-duration-0 me-1 fs-4"></i> Lama Hari
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($excuses as $exc)
                            <tr
                                style="cursor: pointer;"
                                wire:click="showDetail({{ $exc->id }})"
                            >
                                <td>{{ $exc->employee->fullname }}</td>
                                <td>{{ $exc->date_start->format('d/m/Y') }}</td>
                                <td>{{ $exc->date_end->format('d/m/Y') }}</td>
                                <td>
                                    <x-excuse.status-badge :status="$exc->status" />
                                </td>
                                <td>
                                    {{ $exc->date_end->diffInDays($exc->date_start) + 1 }} Hari
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div
                                        class="mx-auto pt-4"
                                        style="width: 30%;"
                                    >
                                        <img
                                            src="{{ asset('img/empty-excuse.svg') }}"
                                            alt="Empty Attendance"
                                            width="100%"
                                        >
                                    </div>

                                    <h5 class="m-0 text-muted text-center my-4">Daftar perizinan masih kosong</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $excuses->links() }}
            </div>
        </div>
    </div>

    <div
        class="modal fade"
        id="excuse-detail-modal"
        wire:ignore.self
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Perizinan</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body text-center">
                    <p class="m-0 text-muted text-start">Deskripsi:</p>
                    <h6 class="text-start">{{ $excuse?->description }}</h6>

                    <a
                        target="_blank"
                        href="{{ Storage::url($excuse?->document) }}"
                        class="btn btn-info mt-4"
                    >
                        <i class="ti ti-file-type-pdf"></i> Lihat Attachment
                    </a>

                    <hr>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button
                        class="btn btn-danger"
                        wire:click="rejectExcuse"
                    >
                        <i class="ti ti-circle-x"></i> Tolak
                    </button>
                    <button
                        class="btn btn-success"
                        wire:click="confirmExcuse"
                    >
                        <i class="ti ti-checkbox"></i> Terima
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            const modalElement = document.getElementById('excuse-detail-modal');
            const modal = new bootstrap.Modal(modalElement);

            modalElement.addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('excuse-cleared');
            });

            Livewire.on('show-excuse', function() {
                modal.show();
            });

            Livewire.on('hide-modal', function() {
                modal.hide();
            });
        </script>
    @endpush
</div>
