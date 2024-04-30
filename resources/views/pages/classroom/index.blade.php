<div class="row">
    <x-slot:title>Data Kelas</x-slot:title>
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
                        data-bs-target="#classroom-modal"
                    ><i class="fas fa-plus me-1"></i> Tambah Kelas</button>
                </div>

                <div
                    class="table-responsive"
                    wire:ignore
                >
                    <table
                        class="table table-striped table-bordered text-nowrap"
                        id="classrooms-table"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.classroom.modal')

    @push('script')
        <script>
            const modalElement = document.getElementById('classroom-modal');
            const modal = new bootstrap.Modal(modalElement);

            const classTable = $('#classrooms-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('classrooms.datatables') }}',
                
                columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false,
                }, {
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'action',
                    searchable: false,
                    sortable: false,
                }]
            });

            Livewire.on('classroom-saved', () => {
                classTable.ajax.reload();
                modal.hide();
            });

            Livewire.on('show-modal', () => {
                modal.show();
            });

            modalElement.addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('classroom-cleared');
            });

            $('#classrooms-table tbody').on('click', '.btn-delete', function() {
                showConfirmation('Data kelas tidak dapat dikembalikan', () => {
                    Livewire.dispatch('classroom-delete', {
                        id: $(this).data('id')
                    });
                });
            });
        </script>
    @endpush
</div>
