<?php
include '../includes/db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "Şifreler uyuşmuyor!";
    exit();
}

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Kayıt başarılı!";
    header("Location: ../login.php");
    exit();
} else {
    echo "Hata: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
