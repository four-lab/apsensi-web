<div class="row">
    <x-slot:title>Data Pegawai</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Pegawai</li>
    </x-slot:navigation>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button
                        class="btn btn-primary mb-4"
                        data-bs-toggle="modal"
                        data-bs-target="#employee-modal"
                    ><i class="fas fa-plus me-1"></i> Tambah Karyawan</button>
                </div>

                <div
                    class="table-responsive"
                    wire:ignore
                >
                    <table
                        class="table table-striped table-bordered text-nowrap"
                        id="employees-table"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.employee.modal')

    @push('script')
        <script>
            const modal = new bootstrap.Modal('#employee-modal');

            const empsTable = $('#employees-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('employees.datatables') }}',
                columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false,
                }, {
                    data: 'username',
                    name: 'username',
                }, {
                    data: 'fullname',
                    name: 'fullname',
                }, {
                    data: 'gender',
                    name: 'gender',
                }, {
                    data: 'action',
                    searchable: false,
                    sortable: false,
                }],
            });

            Livewire.on('employee-saved', () => {
                empsTable.ajax.reload();
                modal.hide();
            });

            Livewire.on('show-modal', () => {
                modal.show();
            });
        </script>
    @endpush
</div>
