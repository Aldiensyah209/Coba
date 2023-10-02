$(document).ready(function() {
    $(".show-more").click(function(e) {
        e.preventDefault();
        $(".product-summary").toggle();
        $(".product-full").toggle();
    });
});


// detail gambar

// $(document).ready(function() {
//     var img = document.getElementById("product-image");
//     var width = img.naturalWidth; // Lebar gambar asli
//     var height = img.naturalHeight; // Tinggi gambar asli


//     var aspectRatio = width / height;


//     var newWidth = 500; // Lebar yang diinginkan
//     var newHeight = 300; // Menghitung tinggi berdasarkan aspek rasio
//     $(".img-content").css({
//         "width": newWidth + "px",
//         "height": newHeight + "px"
//     });
// });

