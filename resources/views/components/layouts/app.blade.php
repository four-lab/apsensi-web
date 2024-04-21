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
    <!-- Preloader -->
    <div class="preloader">
        <img
            src="{{ asset('img/preloader.svg') }}"
            alt="loader"
            class="lds-ripple img-fluid"
        />
    </div>
    <div id="main-wrapper">
        <x-sidebar />

        <div class="page-wrapper">
            <x-topbar />

            <div class="body-wrapper">
                <div class="container-fluid">
                    @if ($title ?? null)
                        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                            <div class="card-body px-4 py-3">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <a
                                                        class="text-muted text-decoration-none"
                                                        href="{{ route('dashboard') }}"
                                                    >Beranda</a>
                                                </li>

                                                {{ $navigation }}
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

            <x-customizer />
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>

    <x-scripts />
</body>

</html>
