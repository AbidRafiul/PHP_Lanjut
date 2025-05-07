<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Selamat datang <?php echo $_POST['nama']; ?> <br>
    NIM : <?php echo $_POST['NIM']; ?> <br>
    Email : <?php echo $_POST['email']; ?> <br>
    Tempat, Tanggal Lahir : <?php echo $_POST['tempat'];?> ,<?php echo $_POST['ttl']; ?> <br>
    Alamat :  <?php echo $_POST["alamat"]; ?> <br>
    Jenis Kelamin : <?php echo $_POST['gender']; ?> <br>
</body>
</html>