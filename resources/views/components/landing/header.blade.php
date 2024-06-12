<div class="fixed w-full z-50">
    <div class="container max-w-7xl mx-auto bg-transparent pt-8 ">
        <div class="flex justify-between items-center">
            <div class="w-full">
                <img
                    class="w-20"
                    src="{{ $logo }}"
                    alt="{{ $alt }}"
                >
            </div>
            <div class="space-x-5 text-white font-lexend text-center tracking-tight w-full">
                @foreach ($items as $item)
                    <x-landing.components.nav-item :item="$item" />
                @endforeach
            </div>
            <div class="w-full flex justify-end items-center">
                <button
                    class="px-5 py-2  bg-transparent border rounded-md text-white font-medium flex gap-2 items-center"
                >
                    Let's Talk
                </button>
            </div>
        </div>
    </div>

</div>
