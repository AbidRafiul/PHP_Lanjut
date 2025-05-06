<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="gambar1">Pilih Gambar yang akan di-upload:</label><br>
    <input type="file" name="gambar" id="gambar1"><br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
// Jalankan hanya jika tombol Submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi apakah file adalah gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".<br>";
    } else {
        echo "<span class='error'>File bukan gambar.</span><br>";
        $uploadOk = 0;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "<span class='error'>Maaf, file sudah ada.</span><br>";
        $uploadOk = 0;
    }

    // Cek ukuran file (maks. 500KB)
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "<span class='error'>Maaf, file terlalu besar (maksimal 500KB).</span><br>";
        $uploadOk = 0;
    }

    // Cek tipe file
    $tipeYangDiizinkan = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($tipeGambar, $tipeYangDiizinkan)) {
        echo "<span class='error'>Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.</span><br>";
        $uploadOk = 0;
    }

    // Proses upload jika tidak ada error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File '" . htmlspecialchars(basename($_FILES["gambar"]["name"])) . "' berhasil diupload.";
        } else {
            echo "<span class='error'>Terjadi kesalahan saat mengupload file.</span>";
        }
    } else {
        echo "<span class='error'>File tidak diupload karena ada kesalahan di atas.</span>";
    }
}
?>

</body>
</html>
