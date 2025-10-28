<!DOCTYPE html>
<html>
<head>
    <title>Multiupload Gambar (AJAX)</title>
</head>
<body>
    <h2>Unggah Beberapa Gambar Sekaligus</h2>

    <form id="upload-form" action="upload_ajax_multi.php" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" id="images" multiple accept=".jpg, .jpeg, .png, .gif">
        <input type="submit" value="Unggah">
    </form>

    <div id="status"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload_multi.js"></script>
</body>
</html>
