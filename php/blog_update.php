<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_id = $_POST['id'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $read_time = $_POST['read_time'];


    $sql = "UPDATE blogs 
                       SET title = '$title', content = '$content', summary = '$summary', 
                           category = '$category', read_time = $read_time 
                       WHERE id = $blog_id";

    if (mysqli_query($conn, $sql)) {
        $message = "Blog başarıyla güncellendi!";
        header("Location: ../blog_detail.php?slug=$slug");
    exit();
    } else {
        $message = "Hata: " . mysqli_error($conn);
    }
}
?>