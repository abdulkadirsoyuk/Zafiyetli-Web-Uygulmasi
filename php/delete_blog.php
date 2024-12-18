<?php

session_start();
$userLoggedIn = $_SESSION['user_id'];
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $blog_id = intval($_GET['id']);


    $sql = "DELETE FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blog_id);

    if ($stmt->execute()) {
        echo "Kayıt başarıyla silindi!";
        header("Location: ../my_blog.php");
        exit();
    } else {
        echo "Kayıt silinirken hata oluştu: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>