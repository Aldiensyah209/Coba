$(document).ready(function () {
    // Mengecek apakah ada parameter loginSuccess di URL
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('loginSuccess')) {
        // Menampilkan alert jika login berhasil
        $('#loginSuccessAlert').fadeIn(1000).delay(5000).fadeOut(1000);
    }
});
