$(document).ready(function(){
    $('#upload-form').submit(function(e){
        e.preventDefault(); // Cegah reload halaman

        var formData = new FormData(this); // Ambil semua data form (termasuk banyak file)

        $.ajax({
            type: 'POST',
            url: 'upload_ajax_multi.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                $('#status').html(response); // Tampilkan hasil upload di halaman
            },
            error: function(){
                $('#status').html('Terjadi kesalahan saat mengunggah file.');
            }
        });
    });
});
