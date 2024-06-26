<div class="bg-primary w-full p-5 ">
    <div class="lg:flex gap-5 max-w-5xl justify-between mx-auto w-full pt-20 pb-20">
        <div class="space-y-5 w-full">
            <img
                src="{{ asset('img/logo-light.png') }}"
                alt=""
                class="max-w-[140px] h-[40px] w-full"
            >
            <p class="text-gray-400 max-w-sm">Apsensi membantu mengelola aktivitas presensi dikhususkan untuk tenaga
                pengajar.</p>
        </div>
        <div class="space-y-5 w-full">
            <div class="lg:flex gap-5 ">
                <div class="space-y-5 w-full mt-8">
                    <h2 class="text-gray-400 text-lg font-semibold">Navigation</h2>
                    <div class="flex flex-col gap-3">
                        @foreach ($items as $item)
                            <a
                                href="#"
                                class="text-white font-medium"
                            >{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="space-y-5 w-full mt-8">
                    <h2 class="text-gray-400 text-lg font-semibold">Social Media</h2>
                    <div class="flex flex-col gap-3">
                        @foreach ($social as $item)
                            <a
                                href="#"
                                class="text-white font-medium"
                            >{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
