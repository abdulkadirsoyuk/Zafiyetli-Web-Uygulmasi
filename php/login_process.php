<?php
session_start();
include '../includes/db.php';


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: ../blog.php");
    exit();
} else {
    $error_message = "Yanlış kullanıcı adı veya şifre!";
}

mysqli_close($conn);
?>
