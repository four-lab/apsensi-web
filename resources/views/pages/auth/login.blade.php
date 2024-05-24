<div class="col-xl-5 col-xxl-4">
    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
        <div class="auth-max-width col-sm-8 col-md-6 col-xl-10 px-4">
            <h2 class="mb-1 fs-7 fw-bolder">Selamat Datang di Apsensi</h2>
            <p class="mb-7">Admin Dashboard</p>
            <form wire:submit.prevent="authenticate">
                <div class="mb-3">
                    <x-form.input
                        type="email"
                        label="Email"
                        name="email"
                    />
                </div>
                <div class="mb-4">
                    <x-form.input
                        type="password"
                        label="Password"
                        name="password"
                    />
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input
                            class="form-check-input primary"
                            type="checkbox"
                            value=""
                            id="remember"
                            wire:model="remember"
                        >
                        <label
                            class="form-check-label text-dark fs-3"
                            for="remember"
                        >
                            Ingat saya
                        </label>
                    </div>
                    <a
                        class="text-primary fw-medium fs-3"
                        href="{{ route('forgot-pass') }}"
                    >Lupa Password?</a>
                </div>
                <button
                    type="submit"
                    class="btn btn-primary w-100 py-8 mb-4 rounded-2"
                >Submit</button>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            Livewire.on('login-failed', () => {
                toastr.error('Email atau password salah', {
                    timeOut: 1000,
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    containerId: "toast-top-right",
                });
            });
        </script>
    @endpush
</div>
