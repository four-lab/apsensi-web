<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a
                href="./index.html"
                class="text-nowrap logo-img"
            >
                <img
                    src="/img/logo.svg"
                    class="dark-logo"
                    width="140"
                    alt=""
                />
                <img
                    src="/img/logo.svg"
                    class="light-logo"
                    width="140"
                    alt=""
                />
            </a>
            <div
                class="close-btn d-lg-none d-block sidebartoggler cursor-pointer"
                id="sidebarCollapse"
            >
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
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
                        class="sidebar-link"
                        href="/dashboard"
                        aria-expanded="false"
                        data-active="/dashboard"
                    >
                        <span><i class="ti ti-dashboard"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master</span>
                </li>
                <li class="sidebar-item">
                    <a
                        class="sidebar-link"
                        href="/employees"
                        aria-expanded="false"
                        data-active="/employees*"
                    >
                        <span><i class="ti ti-users-group"></i></span>
                        <span class="hide-menu">Data Pegawai</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item">
                    <a
                        class="sidebar-link has-arrow"
                        href="#"
                        aria-expanded="false"
                    >
                        <span class="d-flex">
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Cards</span>
                    </a>
                    <ul
                        aria-expanded="false"
                        class="collapse first-level"
                    >
                        <li class="sidebar-item">
                            <a
                                href="./ui-cards.html"
                                class="sidebar-link"
                            >
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Basic Cards</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
