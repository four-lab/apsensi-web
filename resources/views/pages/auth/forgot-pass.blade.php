<div class="col-xl-5 col-xxl-4">
    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
        <div class="auth-max-width col-sm-8 col-md-6 col-xl-10 px-4">
            <h2 class="mb-3 fs-7 fw-bolder">Lupa Password Anda?</h2>
            <p class="mb-7">
                Kami akan mengirimkan kode konfirmasi ke alamat email terdaftar untuk melakukan reset password.
            </p>
            <form wire:submit.prevent="sendCode">
                <div class="mb-4">
                    <x-form.input
                        type="email"
                        label="Alamat Email"
                        name="email"
                        bold="true"
                    />
                </div>
                <button
                    type="submit"
                    class="btn btn-primary w-100 py-8 mb-2 rounded-2"
                >Kirim Kode</button>
                <a
                    href="{{ route('login') }}"
                    class="btn bg-primary-subtle text-primary w-100 py-8"
                >
                    Kembali ke Login</a>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            Livewire.on('empty-email', () => {
                toastr.error('Email tidak terdaftar', {
                    timeOut: 1000,
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    containerId: "toast-top-right",
                });
            });
        </script>
    @endpush
</div>
