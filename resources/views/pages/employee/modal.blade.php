<div
    id="employee-modal"
    class="modal fade"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    wire:ignore.self
>
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form
            class="modal-content"
            method="POST"
            wire:submit.prevent="save"
        >
            <div class="modal-header">
                <h5 class="modal-title">{{ $this->form->employee ? 'Edit' : 'Tambah' }} Pegawai</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="bg-light-primary px-2 py-1 rounded-pill me-2"><i
                                class="ti ti-file-text"></i></span>
                        <h5 class="mt-2">Biodata Pegawai</h5>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 mb-3">
                            <x-form.input
                                name="form.nik"
                                label="NIK"
                            />
                        </div>
                        <div class="col-12 mb-3">
                            <x-form.input
                                name="form.fullname"
                                label="Nama Lengkap"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.input
                                name="form.birthplace"
                                label="Tempat Lahir"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.input
                                type="date"
                                name="form.birthdate"
                                label="Tanggal Lahir"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.select
                                label="Jenis Kelamin"
                                name="form.gender"
                                :items="['male' => 'Pria', 'female' => 'Wanita']"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.input
                                type="email"
                                name="form.email"
                                label="Email"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.input
                                name="form.username"
                                label="Username"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-form.input
                                type="password"
                                name="form.password"
                                label="Password"
                                placeholder="{{ $this->form->employee ? 'Kosongkan jika tidak diubah' : 'Minimal 8 karakter' }}"
                            />
                        </div>
                        <div class="col-12 mb-3">
                            <x-form.textarea
                                name="form.address"
                                label="Alamat"
                            />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="bg-light-primary px-2 py-1 rounded-pill me-2"><i
                                class="ti ti-user-square-rounded"></i></span>
                        <h5 class="mt-2">Foto Pegawai</h5>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col-md-4">
                            <x-form.image-preview
                                name="form.photos.front"
                                :photo="$this->form->photos['front']"
                            >
                                <i class="ti ti-user-scan fs-8"></i>
                                <small class="mt-1">Depan</small>
                            </x-form.image-preview>
                        </div>
                        <div class="col-md-4">
                            <x-form.image-preview
                                name="form.photos.left"
                                :photo="$this->form->photos['left']"
                            >
                                <i class="ti ti-user-minus fs-7"></i>
                                <small class="mt-1">Kiri</small>
                            </x-form.image-preview>
                        </div>
                        <div class="col-md-4">
                            <x-form.image-preview
                                name="form.photos.right"
                                :photo="$this->form->photos['right']"
                            >
                                <i class="ti ti-user-plus fs-7"></i>
                                <small class="mt-1">Kanan</small>
                            </x-form.image-preview>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light"
                    data-bs-dismiss="modal"
                >Tutup</button>

                <button
                    type="submit"
                    class="btn btn-primary"
                >Simpan</button>
            </div>
        </form>
    </div>
</div>
