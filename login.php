<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    $name = $email = "a";
    $nameErr = $emailErr = "";
    
    // fungsi filter pembacaan input
    function bersihkan_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi Username
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
        } else {
            $name = htmlspecialchars($_POST["u"]);
        }
    
        // Validasi Password
        if (empty($_POST["p"])) {
            $emailErr = "masukkan password";
        } else {
            $email = htmlspecialchars($_POST["p"]);
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="u" >
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Password: <input type="password" name="p" >
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Login">
        </form>
</body>
</html>