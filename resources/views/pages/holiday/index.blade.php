<div class="row justify-content-center">
    <x-slot:title>Hari Libur</x-slot:title>
    <x-slot:navigation>
        <li
            class="breadcrumb-item"
            aria-current="page"
        >Hari Libur</li>
    </x-slot:navigation>

    <div class="col-md-10">
        <div class="d-flex justify-content-end mb-4">
            <button
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#holiday-modal"
            ><i class="fas fa-plus me-1"></i> Tambah Hari Libur</button>
        </div>
        <div class="card">
            <div
                class="card-body calendar-sidebar app-calendar"
                wire:ignore
            >
                <div id="calendar-loader">
                    <div class="spinner-border spinner-border-lg"></div>
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    @include('pages.holiday.modal')

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
        <script>
            const calendarLoader = $('#calendar-loader');
            const calendarElement = document.getElementById('calendar');

            const modalElement = document.getElementById('holiday-modal');
            const modal = new bootstrap.Modal(modalElement);

            const calendar = new FullCalendar.Calendar(calendarElement, {
                locale: 'id',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: "prev next",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                eventClick: (info) => {
                    Livewire.dispatch('holiday-edit', {
                        id: info.event.id
                    });
                },
                eventClassNames: function({
                    event: calendarEvent
                }) {
                    return 'calendar-bg-' + calendarEvent._def.extendedProps.calendar;
                },
            });

            function renderEvents(month, year) {
                calendarLoader.fadeIn(0);

                $.ajax({
                    url: '{{ route('holidays.json') }}',
                    dataType: 'json',
                    data: {
                        month,
                        year
                    },
                    success(res) {
                        calendar.removeAllEvents();

                        res.map((holiday) => {
                            calendar.addEvent({
                                id: holiday.id,
                                title: holiday.information,
                                start: `${holiday.date_start}T00:00`,
                                end: `${holiday.date_end}T23:59`,
                                extendedProps: {
                                    calendar: holiday.type == 'regular' ?
                                        'danger' : 'success',
                                },
                            });
                        });

                        calendar.refetchEvents();
                        calendarLoader.fadeOut();
                    },
                });
            }

            $('body').on('click', '.fc-prev-button, .fc-next-button, .fc-today-button', function() {
                const month = calendar.getDate().getMonth() + 1;
                const year = calendar.getDate().getFullYear();

                renderEvents(month, year);
            });

            $('#holiday-modal').on('click', '.btn-delete', function() {
                showConfirmation('Data libur tidak dapat dikembalikan', () => {
                    modal.hide();
                    Livewire.dispatch('holiday-delete', {
                        id: $(this).data('id')
                    });
                });
            });

            modalElement.addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('holiday-cleared');
            });

            Livewire.on('show-modal', () => {
                modal.show();
            });

            Livewire.on('holiday-saved', () => {
                const month = calendar.getDate().getMonth() + 1;
                const year = calendar.getDate().getFullYear();

                modal.hide();
                renderEvents(month, year);
            });

            calendar.render();
            renderEvents();
        </script>
    @endpush
</div>
