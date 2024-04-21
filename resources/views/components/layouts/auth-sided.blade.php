<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Auth | {{ $title ?? config('app.name') }}</title>

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
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a
                            href="../main/index.html"
                            class="text-nowrap logo-img d-block px-4 py-9 w-100"
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
                        <div class="d-none d-xl-flex align-items-center justify-content-center h-75">
                            <img
                                src="{{ asset('img/login-security.svg') }}"
                                alt="modernize-img"
                                class="img-fluid"
                                width="500"
                            >
                        </div>
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <x-scripts />
</body>

</html>
