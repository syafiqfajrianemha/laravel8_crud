// flash message
const flashData = $("#flash-data").data('flashdata');

if (flashData) {
    Swal.fire({
        icon: 'success',
        title: flashData,
        showConfirmButton: true,
    });
}

// button delete
$('.form-delete').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            return $(this).submit();
        }
    })
});