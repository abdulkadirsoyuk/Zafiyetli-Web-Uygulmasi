<?php
session_start();
$userLoggedIn = $_SESSION['user_id'];
$username = $_SESSION['username'];
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

function generateSlug($title) {
    $slug = strtolower($title);
    $slug = str_replace(
        ['ç', 'ğ', 'ı', 'ö', 'ş', 'ü'],
        ['c', 'g', 'i', 'o', 's', 'u'],
        $slug
    );
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['xmlFile'])) {

    // Resim yükleme işlemi
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image_name = basename($_FILES['image']['name']);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $message = "Image uploaded successfully!";
        } else {
            $message = "Failed to upload image.";
        }
    }

    // XML dosyasını işleme
    $xmlFile = $_FILES['xmlFile']['tmp_name'];
    $xmlContent = file_get_contents($xmlFile);

    // XXE zafiyeti burada mevcut: libxml_disable_entity_loader kullanılmadı
    $xml = simplexml_load_string($xmlContent);

    $user_id = $userLoggedIn;
    $title = $xml->title;
    $category = $xml->category;
    $summary = $xml->summary;
    $content = $xml->content;
    $read_time = $xml->read_time;
    $slug = generateSlug($title);

    // Veritabanına kayıt
    $sql = "INSERT INTO blogs (user_id, title, category, summary, content, image_path, read_time, slug, username) 
            VALUES ('$userLoggedIn', '$title', '$category', '$summary', '$content', '$image_name', '$read_time', '$slug', '$username')";

    if (mysqli_query($conn, $sql)) {
        $message = "Blog başarıyla yüklendi!";
        header("Location: ../blog_detail.php?slug=$slug");
        exit();
    } else {
        echo "Hata: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
