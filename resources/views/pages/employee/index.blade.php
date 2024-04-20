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
                        class="table"
                        id="employees-table"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
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

            $('#employees-table').DataTable();

            Livewire.on('employee-saved', () => {
                modal.hide();
            });
        </script>
    @endpush
</div>
