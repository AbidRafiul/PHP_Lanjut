<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nama : <input type="text" name="nama"><br>
        NIM : <input type="text" name="nim"><br>
        Email : <input type="email" name="email"><br>
        Komentar : <textarea name="comment" rows="5" cols="40"></textarea><br>
        <input type="submit"  value="simpan">
        <input type="reset" value="bersihkan">
    </form>
    <?php 
    $name = $email = $comment = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $comment = htmlspecialchars($_POST['comment']);
        echo ("Nama : " . $name . "<br>");
        echo ("Email : " . $email . "<br>");
        echo "Komentar :";
        echo $comment."<br>";

        echo  ("<hr>") ;
    }
    
    ?>
</body>
</html>