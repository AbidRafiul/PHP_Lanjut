<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 200px;
            height: auto;
            border: 1px solid #ccc;
            padding: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Galery Gambar</h2>

<div class="gallery">
<?php
$fileList = glob('gambar/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
foreach ($fileList as $filename) {
    if (is_file($filename)) {
        echo '<img src="' . htmlspecialchars($filename) . '" alt="Gambar">';
    }
}
?>
</div>

</body>
</html>
