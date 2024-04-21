<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>{{ config('app.name') ?? 'Laravel' }}</title>

    <x-styles />
</head>

<body>

    <div class="preloader">
        <img
            src="{{ asset('img/preloader.svg') }}"
            alt="loader"
            class="lds-ripple img-fluid"
        >
    </div>

    <div
        class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed"
    >
        <x-sidebar />

        <div class="body-wrapper">
            <x-navbar />

            <div class="container-fluid">
                @if (isset($title))
                    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a
                                                    class="text-muted "
                                                    href="{{ route('dashboard') }}"
                                                >Dashboard</a>

                                                {{ $navigation }}
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>

    <!--  Search Bar -->
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input
                        type="search"
                        class="form-control fs-3"
                        placeholder="Search here"
                        id="search"
                    />
                    <span
                        data-bs-dismiss="modal"
                        class="lh-1 cursor-pointer"
                    >
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </span>
                </div>
                <div
                    class="modal-body message-body"
                    data-simplebar=""
                >
                    <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <x-scripts />
</body>

</html>
