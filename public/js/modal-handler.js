$(document).ready(function (e) {
    const SITEURL = window.location.origin + "/admin";
    let dataId;
    let valuesTambahModal = [
        "BajuXuzuModal",
        "BajuBintangKonveksiModal",
        "BajuAnekaSlempangModal",
        "KontenHomeModal",
        "KontenHomeVideoModal",
        "KontenAboutModal",
        "KontenSmartBuyModal",
        "KontenTestimoniModal",
        "SosmedModal",
        "BeritaModal",
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
    $("#editBajuXuzuModal").on("show.bs.modal", function (e) {
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

    $("#updateFormXuzu").on("submit", function (e) {
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
                $("#updateFormXuzu").trigger("reset");
                $("#editBajuXuzuModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE BINTANG KONVEKSI
    $("#editBajuBintangKonveksiModal").on("show.bs.modal", function (e) {
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

    $("#updateFormBintangKonveksi").on("submit", function (e) {
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
                $("#updateFormBintangKonveksi").trigger("reset");
                $("#editBajuBintangKonveksiModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE ANEKA SLEMPANG
    $("#editBajuAnekaSlempangModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/aneka-slempang/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_nama").val(data.nama_as);
                $("#edit_harga").val(data.harga_as);
                $("#edit_deskripsi").text(data.deskripsi_as);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormAnekaSlempang").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/aneka-slempang/update/" + dataId;

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
                $("#updateFormAnekaSlempang").trigger("reset");
                $("#editBajuAnekaSlempangModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE HOME
    $("#editKontenHomeModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/home/" + id,
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

    $("#updateFormKontenHome").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/home/update/" + dataId;

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
                $("#updateFormKontenHome").trigger("reset");
                $("#editKontenHomeModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE HOME VIDEO
    $("#editKontenHomeVideoModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/home-video/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_tautan").val(data.tautan);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormKontenHomeVideo").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/home-video/update/" + dataId;

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
                $("#updateFormKontenHomeVideo").trigger("reset");
                $("#editKontenHomeVideoModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE ABOUT
    $("#editKontenAboutModal").on("show.bs.modal", function (e) {
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
                $("#editKontenAboutModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE SMARTBUY
    $("#editKontenSmartBuyModal").on("show.bs.modal", function (e) {
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

    $("#updateFormKontenSmartBuy").on("submit", function (e) {
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
                $("#updateFormKontenSmartBuy").trigger("reset");
                $("#editKontenSmartBuyModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE TESTIMONI
    $("#editKontenTestimoniModal").on("show.bs.modal", function (e) {
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
                $("#editKontenTestimoniModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE SOCIAL MEDIA
    $("#editSosmedModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/social-media/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_whatsapp").val(data.whatsapp);
                $("#edit_instagram").val(data.instagram);
                $("#edit_facebook").val(data.facebook);
                $("#edit_tiktok").val(data.tiktok);

                if (data.isPriority == 1) {
                    $("#edit_priority").prop("checked", true);
                } else {
                    $("#edit_priority").prop("checked", false);
                }

                console.log(data);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormSosmed").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/social-media/update/" + dataId;

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
                $("#updateFormSosmed").trigger("reset");
                $("#editSosmedModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    // UPDATE BERITA
    $("#editBeritaModal").on("show.bs.modal", function (e) {
        const id = $(e.relatedTarget).data("id");

        $.ajax({
            url: SITEURL + "/berita/" + id,
            type: "GET",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#edit_judul").val(data.judul);
                $("#edit_tautan").val(data.tautan);
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });

    $("#updateFormBerita").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const token = $('meta[name="csrf-token"]').attr("content");
        const url = SITEURL + "/berita/update/" + dataId;

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
                $("#updateFormBerita").trigger("reset");
                $("#editBeritaModal").modal("hide");

                location.reload();
            },
            error: function (data) {
                alert("Error: " + data.responseJSON.message);
            },
        });
    });
});
