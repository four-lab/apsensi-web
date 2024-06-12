<x-landing-layout>
    <x-landing.header
        :logo="asset('/img/logo-light.png')"
        alt="apsensi-web"
        :items="[
            [
                'name' => 'Home',
            ],
            [
                'name' => 'Features',
            ],
            [
                'name' => 'FAQ',
            ],
            [
                'name' => 'About US',
            ],
        ]"
    />
    <x-landing.hero />
    <x-landing.feature />
</x-landing-layout>
