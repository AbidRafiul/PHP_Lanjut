<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error { color: red; font-size: 12px; }
        .success { color: green; }
    </style>
</head>
<body>

<?php
session_start();

$nameErr = $passErr = "";
$username = $password = "";
$loginMessage = "";

function bersihkan_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $nameErr = "Username wajib diisi.";
        } else {
            $username = bersihkan_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $passErr = "Password wajib diisi.";
        } else {
            $password = bersihkan_input($_POST["password"]);
        }

        if ($username && $password) {
            if ($username === "Abid" && $password === "123123") {
                $_SESSION["username"] = $username;
                setcookie("username", "Abid", time() + 3600);
                $loginMessage = "<p class='success'>Login berhasil. Selamat datang, $username!</p>";
            } else {
                throw new Exception("Username atau Password salah.");
            }
        }
    }
} catch (Exception $e) {
    $loginMessage = "<p class='error'>" . $e->getMessage() . "</p>";
}
?>

<h2>Login Form</h2>
<form method="post" action="">
    Username: <input type="text" name="username" value="<?= $username ?>">
    <span class="error"><?= $nameErr ?></span><br><br>
    Password: <input type="password" name="password">
    <span class="error"><?= $passErr ?></span><br><br>
    <input type="submit" value="Login">
</form>

<?= $loginMessage ?>

<?php
if (isset($_SESSION["username"])) {
    echo "<h3>Data dari File JSON</h3>";

    $jsonFile = "data.json";

    if (file_exists($jsonFile)) {
        $jsonString = file_get_contents($jsonFile);
        $data = json_decode($jsonString, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "<p class='error'>JSON Error: " . json_last_error_msg() . "</p>";
        } elseif (!is_array($data)) {
            echo "<p class='error'>Data JSON tidak valid atau kosong.</p>";
        } else {
            echo "<ul>";
            foreach ($data as $item) {
                echo "<li>Nama: {$item['nama']}, Umur: {$item['umur']}</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "<p class='error'>File data.json tidak ditemukan.</p>";
    }

    echo "<p><strong>Cookie username:</strong> " . ($_COOKIE["username"] ?? "Belum diset") . "</p>";
}
?>

</body>
</html>
