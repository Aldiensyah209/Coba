$(document).ready(function (e) {
    const SITEURL = window.location.origin;
    let dataId;

    $("tbody tr td #buttonEdit").on("click", function () {
        dataId = $(this).attr("data-id");
    });

    $("#editBajuModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/baju/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_nama_baju").val(data.nama_baju);
                $("#edit_harga").val(data.harga);
                $("#edit_deskripsi").text(data.deskripsi);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#tambahBajuModal").on("hidden.bs.modal", function (e) {
        e.preventDefault();
        $("#createForm").trigger("reset");
    });

    $("#updateForm").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/baju/update/" + dataId;

        $.ajax({
            type: "POST",
            header: {
                "X-CSRF-TOKEN": token,
            },
            url: url,
            enctype: "multipart/form-data",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#updateForm").trigger("reset");
                $("#editBajuModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });
});
