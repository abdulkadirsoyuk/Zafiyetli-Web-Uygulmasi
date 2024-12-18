<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = $_POST['blog_id'];       
    $content = $_POST['content'];
    $slug = $_POST['blog_slug'];
   
    $sqlcom = "INSERT INTO comments (blog_slug,  content) VALUES ('$slug', '$content')";

    if ($conn->query($sqlcom)) {
        header("Location: ../blog_detail.php?slug={$slug}");
        exit();
    }
    
}

?>