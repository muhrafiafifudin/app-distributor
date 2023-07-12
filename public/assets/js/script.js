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

// $(document).ready(function() {
//     $(".delete-data").click(function (e) {
//         e.preventDefault();

//         var item_id = $(this)
//             .closest(".item-data")
//             .find(".item-id")
//             .val();

//         $.ajaxSetup({
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//         });

//         $.ajax({
//             method: "POST",
//             url: "transaksi/delete-item",
//             data: {
//                 item_id: item_id,
//             },
//             success: function (response) {
//                 // console.log(response);
//                 // swal("", response.status, "success").then(function () {
//                 // });
//                 location.reload();
//             },
//         });
//     });
// })

