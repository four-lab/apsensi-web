<div
    id="schedule-modal"
    class="modal fade"
    tabindex="-1"
    wire:ignore.self
>
    <div class="modal-dialog">
        <form
            class="modal-content"
            method="POST"
            wire:submit.prevent="save"
        >
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jadwal</h5>

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
                        label="Mata Pelajaran"
                        name="form.subject_id"
                        :items="$this->subjects"
                    />
                </div>
                <div class="col-12 mb-3">
                    <x-form.select
                        label="Guru Pengajar"
                        name="form.employee_id"
                        :items="$this->employees"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input
                        label="Jam Mulai"
                        name="form.time_start"
                        type="time"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input
                        label="Jam Selesai"
                        name="form.time_end"
                        type="time"
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
                >Simpan</button>
            </div>
        </form>
    </div>
</div>
