<div
    class="fixed w-full z-50 shadow transition-colors text-white"
    id="header"
>
    <div class="container max-w-7xl mx-auto bg-transparent p-5">
        <div class="flex justify-between items-center">
            <div class="w-full">
                <img
                    class="w-20 logo-light"
                    src="{{ asset('img/logo-light.png') }}"
                    alt="{{ $alt }}"
                >
                <img
                    class="w-20 logo-dark hidden"
                    src="{{ asset('img/logo-dark.png') }}"
                    alt="{{ $alt }}"
                >
            </div>
            <div class="space-x-5 lg:block hidden font-lexend text-center tracking-tight w-full">
                @foreach ($items as $item)
                    <x-landing.components.nav-item :item="$item" />
                @endforeach
            </div>
            <div class="w-full flex justify-end items-center">
                <button
                    id="btn-talk"
                    class="px-5 py-2  bg-transparent border rounded-md  font-medium flex gap-2 items-center"
                >
                    Let's Talk
                </button>
            </div>
            <div class="lg:hidden flex justify-center items-center">
                <button class="text-3xl">
                    <iconify-icon icon="fe:bar"></iconify-icon>
                </button>
            </div>
        </div>
    </div>

</div>
