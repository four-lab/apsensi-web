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
