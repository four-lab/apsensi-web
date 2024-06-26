<x-landing-layout>
    <x-landing.header
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
    <x-landing.faq />
    <x-landing.footer
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
        :social="[
            [
                'name' => 'Instagram',
            ],
            [
                'name' => 'Youtube',
            ],
            [
                'name' => 'Github',
            ],
        ]"
    />
</x-landing-layout>
