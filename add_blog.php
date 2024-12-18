<?php
session_start();
$userLoggedIn = $_SESSION['user_id'];
$username = $_SESSION['username'];
include 'includes/db.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $userLoggedIn;
    $title = $_POST['title'];
    $category = $_POST['category'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $read_time = $_POST['read_time'];
    $slug = generateSlug($title);
    $image_name = '';

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_name = basename($_FILES['image']['name']);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $message = "Image uploaded successfully!";
        } else {
            $message = "Failed to upload image.";
        }
    }

    

    $sql = "INSERT INTO blogs (user_id, title, category, summary, content, image_path, read_time, slug, username) 
            VALUES ('$userLoggedIn', '$title', '$category', '$summary', '$content', '$image_name', '$read_time', '$slug', '$username')";

    if (mysqli_query($conn, $sql)) {
        $message = "Blog başarıyla yüklendi!";
    } else {
        $message = "Hata: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ekle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php if ($userLoggedIn): ?>
<?php include 'includes/login_header.php'; ?>
<?php else: ?>
    <?php include 'includes/header.php'; ?>
    <?php endif; ?>

<div class="container mt-5">
        <h2 class="text-center mb-4">Yeni Blog Ekle</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Başlık</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Blog başlığı girin" required>
            </div>
            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Blog kategori girin" required>
            </div>
            <div class="form-group">
                <label for="summary">Özet</label>
                <textarea class="form-control" id="summary" name="summary" rows="3" placeholder="Kısa bir özet yazın" required></textarea>
            </div>
            <div class="form-group">
                <label for="content">İçerik</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Blog içeriğini yazın" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Resim Yükleyin</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="read_time">Okuma Süresi (dakika)</label>
                <input type="number" class="form-control" id="read_time" name="read_time" placeholder="Okuma süresini girin" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Blog Ekle</button>
        </form>

        <form method="post" action="php/add_blog_xml.php" enctype="multipart/form-data">

        <div class="form-group">
    <label for="xmlFile">XML Dosyası Yükleyin:</label>
    <a download="assets\xml\ad_blog.xml" href="assets\xml\ad_blog.xml" target="_blank">örnek xml dosyası</a>
    <input type="file" id="xmlFile" name="xmlFile" accept=".xml">
    </div>
    <div class="form-group">
                <label for="image">Resim Yükleyin</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
    <button type="submit" class="btn btn-primary btn-block">XML ile Ekle</button>
</form>


    </div>



  
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
