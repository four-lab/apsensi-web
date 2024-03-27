<aside class="left-sidebar with-vertical">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a
                href="index.html"
                class="text-nowrap logo-img"
            >
                <img
                    src="{{ asset('img/logo-dark.png') }}"
                    class="dark-logo"
                    alt="Logo-Dark"
                    width="140"
                />
                <img
                    src="{{ asset('img/logo-light.png') }}"
                    class="light-logo"
                    alt="Logo-light"
                    width="140"
                />
            </a>
            <a
                href="javascript:void(0)"
                class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none"
            >
                <i class="ti ti-x"></i>
            </a>
        </div>

        <nav
            class="sidebar-nav scroll-sidebar"
            data-simplebar
        >
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a
                        class="sidebar-link @active('dashboard')"
                        href="{{ route('dashboard') }}"
                        aria-expanded="false"
                    >
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img
                        src="{{ asset('img/profile/noimage.jpg') }}"
                        class="rounded-circle"
                        width="40"
                        height="40"
                        alt=""
                    />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">
                        {{ Str::limit(Auth::user()->name, 8) }}
                    </h6>
                    <span class="fs-2">Admin</span>
                </div>
                <a
                    href="{{ route('logout') }}"
                    class="border-0 bg-transparent text-primary ms-auto"
                    tabindex="0"
                    type="button"
                    aria-label="logout"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="logout"
                >
                    <i class="ti ti-power fs-6"></i>
                </a>
            </div>
        </div>
    </div>
</aside>
