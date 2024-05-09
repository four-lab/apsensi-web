<div
    id="subject-modal"
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
                <h5 class="modal-title">{{ $this->form->subject ? 'Edit' : 'Tambah' }} Mapel</h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <x-form.input
                        name="form.name"
                        label="Nama Mapel"
                    />
                </div>
                <div class="mb-3">
                    <x-form.input
                        name="form.max_lateness"
                        label="Maksimal Keterlambatan"
                    />
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
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
