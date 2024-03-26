<!--  Header Start -->
<header class="topbar">
    <div class="with-vertical">
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link sidebartoggler nav-icon-hover ms-n3"
                        id="headerCollapse"
                        href="javascript:void(0)"
                    >
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>

            <div class="d-block d-lg-none">
                <a
                    href="index.html"
                    class="text-nowrap logo-img"
                >
                    <img
                        src="{{ asset('img/logo-dark.png') }}"
                        class="dark-logo"
                        alt="Logo-Dark"
                        width="125"
                    />
                    <img
                        src="{{ asset('img/logo-light.png') }}"
                        class="light-logo"
                        alt="Logo-light"
                        width="125"
                    />
                </a>
            </div>
            <a
                class="navbar-toggler nav-icon-hover p-0 border-0"
                href="javascript:void(0)"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </a>
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav"
            >
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item">
                            <a
                                class="nav-link moon dark-layout"
                                href="javascript:void(0)"
                            >
                                <iconify-icon
                                    icon="solar:moon-line-duotone"
                                    class="moon fs-7"
                                ></iconify-icon>
                            </a>
                            <a
                                class="nav-link sun light-layout"
                                href="javascript:void(0)"
                            >
                                <iconify-icon
                                    icon="solar:sun-2-line-duotone"
                                    class="sun fs-7"
                                ></iconify-icon>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link pe-0"
                                href="javascript:void(0)"
                                id="drop1"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img
                                            src="{{ asset('img/profile/noimage.jpg') }}"
                                            class="rounded-circle"
                                            width="35"
                                            height="35"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop1"
                            >
                                <div
                                    class="profile-dropdown position-relative"
                                    data-simplebar
                                >
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">
                                            User Profile
                                        </h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img
                                            src="{{ asset('img/profile/noimage.jpg') }}"
                                            class="rounded-circle"
                                            width="80"
                                            height="80"
                                            alt=""
                                        />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">
                                                Mathew Anderson
                                            </h5>
                                            <span class="mb-1 d-block">Designer</span>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i>
                                                info@modernize.com
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a
                                            href="#"
                                            class="py-8 px-7 mt-8 d-flex align-items-center"
                                        >
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6"
                                            >
                                                <img
                                                    src="{{ asset('img/logo/icon-account.svg') }}"
                                                    alt=""
                                                    width="24"
                                                    height="24"
                                                />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">
                                                    My Profile
                                                </h6>
                                                <span class="fs-2 d-block text-body-secondary">Account
                                                    Settings</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <a
                                            href="#"
                                            class="btn btn-outline-primary"
                                        >Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--  Header End -->
