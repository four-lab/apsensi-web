<div class="row">
    <x-slot:title>Data Mapel</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Kelas</li>
    </x-slot:navigation>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button
                        class="btn btn-primary mb-4"
                        data-bs-toggle="modal"
                        data-bs-target="#subject-modal"
                    ><i class="fas fa-plus me-1"></i> Tambah Mapel</button>
                </div>

                <div
                    class="table-responsive"
                    wire:ignore
                >
                    <table
                        class="table table-striped table-bordered text-nowrap"
                        id="subjects-table"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mapel</th>
                                <th>Maksimal Keterlambatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.subject.modal')

    @push('script')
        <script>
            const modalElement = document.getElementById('subject-modal');
            const modal = new bootstrap.Modal(modalElement);

            const classTable = $('#subjects-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('subjects.datatables') }}',
                columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false,
                }, {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'max_lateness',
                    name: 'max_lateness',
                }, {
                    data: 'action',
                    searchable: false,
                    sortable: false,
                }]
            });

            Livewire.on('subject-saved', () => {
                classTable.ajax.reload();
                modal.hide();
            });

            Livewire.on('show-modal', () => {
                modal.show();
            });

            modalElement.addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('subject-cleared');
            });

            $('#subjects-table tbody').on('click', '.btn-delete', function() {
                showConfirmation('Data kelas tidak dapat dikembalikan', () => {
                    Livewire.dispatch('subject-delete', {
                        id: $(this).data('id')
                    });
                });
            });
        </script>
    @endpush
</div>
