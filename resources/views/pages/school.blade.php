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
                            class="alert alert-primary border-0 text-muted d-flex justify-content-between gap-4 align-items-center">
                            <i
                                class="ti ti-click"
                                style="font-size: 2.5rem;"
                            ></i>
                            <p class="m-0">
                                Klik pada peta untuk menentukan area sekolah, anda juga dapat mereset ulang area
                                menggunakan tombol yang disediakan pada bagian bawah.
                            </p>
                        </div>

                        <div
                            class="my-2 mb-4"
                            wire:ignore
                        >
                            <div id="map"></div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div
                                class="d-flex gap-2"
                                wire:ignore
                            >
                                <button
                                    id="undo-btn"
                                    class="btn btn-outline-info"
                                    type="button"
                                    disabled
                                >
                                    <i class="ti ti-arrow-back-up me-1 btn-icon"></i> Undo
                                </button>
                                <button
                                    id="redo-btn"
                                    class="btn btn-outline-info"
                                    type="button"
                                    disabled
                                >
                                    <i class="ti ti-arrow-forward-up me-1 btn-icon"></i> Redo
                                </button>
                            </div>
                            <button
                                class="btn btn-outline-danger"
                                type="button"
                                id="reset-area-btn"
                            >
                                <i class="ti ti-square-letter-x me-1 btn-icon"></i>Reset
                            </button>
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

            .btn-icon {
                font-size: 1rem;
            }
        </style>
    @endpush

    @push('script')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script>
            const undoStack = [];
            const redoStack = [];
            const map = L.map('map').setView([-8.15764000498236, 113.72466585846753], 16);

            let coordinates = @json($coordinates);
            let polygon = L.polygon(coordinates).addTo(map);

            function setMapCenter() {
                if (coordinates.length < 1) return;

                const turfPolygon = turf.polygon([coordinates]);
                const coordinate = turf.center(turfPolygon).geometry.coordinates;

                map.panTo(new L.LatLng(coordinate[0], coordinate[1]));
            }

            function updatePolygon() {
                map.removeLayer(polygon);
                polygon = L.polygon(coordinates).addTo(map);
            }

            function updateButtons() {
                $('#undo-btn').prop('disabled', coordinates.length === 0);
                $('#redo-btn').prop('disabled', redoStack.length === 0);
            }

            function undo() {
                if (coordinates.length < 1) return;

                const lastAction = undoStack.pop();

                if (lastAction.action == 'add') {
                    coordinates.pop();
                    redoStack.push(lastAction);
                    Livewire.dispatch('undoredo-coordinate');
                } else {
                    coordinates.push(lastAction.coordinate);
                    redoStack.push(lastAction);
                    Livewire.dispatch('undoredo-coordinate', lastAction.coordinate);
                }

                updatePolygon();
                updateButtons();
            }

            function redo() {
                if (redoStack.length < 1) return;

                const lastUndo = redoStack.pop();

                if (lastUndo.action == 'add') {
                    coordinates.push(lastUndo.coordinate);
                    undoStack.push(lastUndo);
                    Livewire.dispatch('undoredo-coordinate', lastUndo.coordinate);
                } else {
                    coordinates.pop();
                    undoStack.push(lastUndo);
                    Livewire.dispatch('undoredo-coordinate');
                }

                updatePolygon();
                updateButtons();
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
                undoStack.push({
                    action: 'add',
                    coordinate: [e.latlng.lat, e.latlng.lng]
                });

                updatePolygon();
                updateButtons();
            });

            $('#reset-area-btn').click(function() {
                coordinates = [];

                Livewire.dispatch('clear-coordinates');
                updatePolygon();
                updateButtons();
            });

            $('#undo-btn').click(() => undo());
            $('#redo-btn').click(() => redo());

            setMapCenter();
        </script>
    @endpush
</div>
