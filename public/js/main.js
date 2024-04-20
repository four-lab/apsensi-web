Livewire.on('swal-s', function(message) {
    Swal.fire({
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    });
});
