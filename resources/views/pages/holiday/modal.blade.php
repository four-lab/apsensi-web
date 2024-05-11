<div
    id="holiday-modal"
    class="modal fade"
    tabindex="-1"
    data-bs-keyboard="false"
    wire:ignore.self
>
    <div class="modal-dialog modal-dialog-scrollable">
        <form
            class="modal-content"
            method="POST"
            wire:submit.prevent="save"
        >
            <div class="modal-header">
                <h5 class="modal-title">{{ $this->form->holiday ? 'Edit' : 'Tambah' }} Hari Libur</h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body row">
                <div class="col-12 mb-3">
                    <x-form.select
                        name="form.type"
                        label="Jenis"
                        :items="['regular' => 'Umum', 'educational' => 'Pendidikan']"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input
                        name="form.date_start"
                        label="Tanggal Mulai"
                        type="date"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input
                        name="form.date_end"
                        label="Tanggal Akhir"
                        type="date"
                    />
                </div>
                <div class="col-12 mb-3">
                    <x-form.input
                        name="form.information"
                        label="Informasi"
                        type="text"
                    />
                </div>
            </div>
            <div class="modal-footer">
                @if ($this->form->holiday)
                    <button
                        type="button"
                        class="btn btn-danger float-left btn-delete"
                        data-id="{{ $this->form->holiday->id }}"
                    >
                        Hapus
                    </button>
                @else
                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >Tutup</button>
                @endif

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
