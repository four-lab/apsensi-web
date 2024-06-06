<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/template.init.js') }}"></script>
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<script src="{{ asset('js/template.custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/plug-ins/2.0.5/i18n/id.json"></script>
<script src="https://unpkg.com/@turf/turf@6.5.0/turf.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    Object.assign(DataTable.defaults, {
        language: {
            url: '{{ asset('datatables-id.json') }}',
        },
    })

    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: 'ap1',
    })
</script>

@livewireScripts
@stack('script')

<script src="{{ asset('js/main.js') }}"></script>
