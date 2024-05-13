<div>
    <x-slot:title>Tentang Sekolah</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Pengaturan</li>
    </x-slot:navigation>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form
                class="card"
                wire:submit.prevent="save"
            >
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="text-center">Nama Instansi</h6>
                        <input
                            type="text"
                            class="form-control text-center @error('schoolname') is-invalid @enderror"
                            wire:model="schoolname"
                        >
                        @error('schoolname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6 class="text-center">Lokasi Sekolah</h6>
                        <div
                            class="my-2"
                            wire:ignore
                        >
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @push('style')
        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        />
        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"
        />

        <style>
            #map {
                height: 35em;
            }
        </style>
    @endpush

    @push('script')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script>
            const map = L.map('map').setView([-8.15764000498236, 113.72466585846753], 16);
            const coordinates = @json($coordinates);
            let polygon = L.polygon(coordinates).addTo(map);

            function updatePolygon() {
                map.removeLayer(polygon);
                polygon = L.polygon(coordinates).addTo(map);
            }

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/irsyadulibad/clw1w8j6q01a301pccu8991nu/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiaXJzeWFkdWxpYmFkIiwiYSI6ImNscGV4dWhndzE4dWIyanA5aHp4MGhwb2oifQ.gsGOBkkHiaovSvoyj3japw', {}
            ).addTo(map);

            L.Control.geocoder().addTo(map);

            map.on('click', function(e) {
                Livewire.dispatch('add-coordinate', {
                    lat: e.latlng.lat,
                    long: e.latlng.lng,
                });

                coordinates.push([e.latlng.lat, e.latlng.lng]);
                updatePolygon();
            });
        </script>
    @endpush
</div>
