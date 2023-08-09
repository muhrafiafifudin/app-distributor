$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).on("click", ".delete-data", function (e) {
    e.preventDefault();

    var item_id = $(".item-id").val()

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
            $.ajax({
                url: "transaksi/delete-item",
                method: "POST",
                data: { item_id: item_id },
                success: function (response) {
                    location.reload();
                },
            });
        }
    });
});

$(".date-picker").flatpickr();

$(".addQuantity").click(function (e) {
    e.preventDefault();

    var item_id = $(this).closest(".item-data").find(".item-id").val();
    var item_qty = $(this).closest(".item-data").find(".qty-input").val();

    var split = item_qty.split(" ");
    var item_qty = parseInt(split[0]);

    var item_qty = item_qty + 1;

    var data = {
        item_id: item_id,
        item_qty: item_qty,
    };

    $.ajax({
        method: "POST",
        url: "transaksi/update-item",
        data: data,
        success: function (response) {
            window.location.reload();
        },
    });
});

$(".lessQuantity").click(function (e) {
    e.preventDefault();

    var item_id = $(this).closest(".item-data").find(".item-id").val();
    var item_qty = $(this).closest(".item-data").find(".qty-input").val();

    var split = item_qty.split(" ");
    var item_qty = parseInt(split[0]);

    var item_qty = item_qty - 1;

    var data = {
        item_id: item_id,
        item_qty: item_qty,
    };

    $.ajax({
        method: "POST",
        url: "transaksi/update-item",
        data: data,
        success: function (response) {
            window.location.reload();
        },
    });
});
