$(document).on("click", ".delete-data", function (e) {
    e.preventDefault();

    var form = $(this).closest("form");

    Swal.fire({
        html: "Yakin untuk menghapus data ??",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Cancel",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-secondary",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
