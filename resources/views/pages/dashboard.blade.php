<div class="row mt-3">
    <div class="col-md-4">
        <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
            <div class="card-body d-relative py-4 px-5">
                <h2 class="fw-semibold text-primary mb-2">{{ $employees }}</h2>
                <p class="fw-semibold text-primary mb-0">Pegawai</p>

                <i class="ti ti-users dashboard-icon text-primary"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
            <div class="card-body d-relative py-4 px-5">
                <h2 class="fw-semibold text-warning mb-2">{{ $subjects }}</h2>
                <p class="fw-semibold text-warning mb-0">Mata Pelajaran</p>

                <i class="ti ti-notebook dashboard-icon text-warning"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
            <div class="card-body d-relative py-4 px-5">
                <h2 class="fw-semibold text-danger mb-2">{{ $classrooms }}</h2>
                <p class="fw-semibold text-danger mb-0">Jumlah Kelas</p>

                <i class="ti ti-chalkboard dashboard-icon text-danger"></i>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Grafik Kehadiran</h5>
                <p class="card-subtitle mb-2">Statistik kehadiran dalam 5 bulan</p>
                <div id="graphic-chart"></div>
            </div>
        </div>
    </div>

    @push('style')
        <style>
            .dashboard-icon {
                font-size: 3.5rem;
                position: absolute;
                top: 25%;
                right: 8%;
            }
        </style>
    @endpush

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const channel = pusher.subscribe('attendance');
            const options = {
                grid: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                chart: {
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    height: 350,
                    type: "area",
                    toolbar: {
                        show: false,
                    },
                },
                colors: ["#13deb9", "#ffae1f", "#fa896b", "#49beff"],
                stroke: {
                    curve: "smooth",
                },
                series: [],
                xaxis: {
                    categories: ['-'],
                },
                yaxis: {
                    labels: {
                        formatter(value) {
                            return parseInt(value);
                        },
                    }
                },
            }

            const chart = new ApexCharts(document.querySelector("#graphic-chart"), options);

            function renderChart() {
                $.ajax({
                    url: '{{ route('chart') }}',
                    dataType: 'json',
                    success(res) {
                        options.series = res.series;
                        options.xaxis.categories = res.months;

                        chart.updateOptions(options);
                    }
                });
            }

            chart.render();
            channel.bind('attendance-updated', (data) => {
                renderChart();
            });

            renderChart();
        </script>
    @endpush
</div>
