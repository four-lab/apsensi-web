Livewire.on('swal-s', function(message) {
    Swal.fire({
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    });
});

Livewire.on('swal-e', function(message) {
    Swal.fire({
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 1500
    });
});

function showConfirmation(message, callback) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: message,
        icon: 'question',
        showCancelButton: true,
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            callback();
        }
    });
}
