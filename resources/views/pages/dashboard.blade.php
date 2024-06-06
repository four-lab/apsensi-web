<div>

    @push('script')
        <script>
            const channel = pusher.subscribe('attendance');
            channel.bind('attendance-updated', (data) => {
                alert('sip');
            })
        </script>
    @endpush
</div>
