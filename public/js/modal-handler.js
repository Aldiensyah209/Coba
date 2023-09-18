$(document).ready(function (e) {
    const SITEURL = window.location.origin;
    let dataId;
    let valuesTambahModal = [
        "BajuModal",
        "BajuModalBK",
        "KontenModal",
        "KontenModalAbout",
        "KontenModalSmartbuy",
        "KontenModalTestimoni",
    ];

    $("tbody tr td #buttonEdit").on("click", function () {
        dataId = $(this).attr("data-id");
    });

    $.each(valuesTambahModal, function (index, item) {
        $("#tambah" + item).on("hidden.bs.modal", function (event) {
            event.preventDefault();
            $("#createForm").trigger("reset");
        });
    });

    // UPDATE XUZU
    $("#editBajuModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/xuzu/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_nama").val(data.nama);
                $("#edit_harga").val(data.harga);
                $("#edit_deskripsi").text(data.deskripsi);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateForm").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/xuzu/update/" + dataId;

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

    // UPDATE BINTANG KONVEKSI
    $("#editBajuModalBK").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/bintang-konveksi/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_nama").val(data.nama_bk);
                $("#edit_harga").val(data.harga_bk);
                $("#edit_deskripsi").text(data.deskripsi_bk);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormBK").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/bintang-konveksi/update/" + dataId;

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
                $("#updateFormBK").trigger("reset");
                $("#editBajuModalBK").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE HOME
    $("#editKontenModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/home-content/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_judul").val(data.judul);
                $("#edit_deskripsi").text(data.deskripsi);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormKonten").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/home-content/update/" + dataId;

        $.ajax({
            type: "POST",
            header: {
                "X-CSRF-TOKEN": token,
            },
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#updateFormKonten").trigger("reset");
                $("#editKontenModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE ABOUT
    $("#editKontenModalAbout").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/about/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_judul").val(data.judul);
                $("#edit_deskripsi").text(data.deskripsi);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormKontenAbout").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/about/update/" + dataId;

        $.ajax({
            type: "POST",
            header: {
                "X-CSRF-TOKEN": token,
            },
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#updateFormKontenAbout").trigger("reset");
                $("#editKontenModalAbout").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE SMARTBUY
    $("#editKontenModalSmartbuy").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/smartbuy/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_judul").val(data.judul);
                $("#edit_deskripsi").val(data.deskripsi);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormKontenSmartbuy").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/smartbuy/update/" + dataId;

        $.ajax({
            type: "POST",
            header: {
                "X-CSRF-TOKEN": token,
            },
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#updateFormKontenSmartbuy").trigger("reset");
                $("#editKontenModalSmartbuy").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE TESTIMONI
    $("#editKontenModalTestimoni").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/testimoni/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_keterangan").val(data.keterangan);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormKontenTestimoni").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/testimoni/update/" + dataId;

        $.ajax({
            type: "POST",
            header: {
                "X-CSRF-TOKEN": token,
            },
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#updateFormKontenTestimoni").trigger("reset");
                $("#editKontenModalTestimoni").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });
});
