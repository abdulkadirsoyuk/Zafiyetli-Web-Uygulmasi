<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
include 'includes/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user_id = $userLoggedIn;
    $blog_id = $_GET['id'];

    
    $sql = "SELECT * FROM blogs WHERE id = $blog_id";
    $result = $conn->query($sql);

}
$blog = $result->fetch_assoc();


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogu Düzenle</title>
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

        <form action="php/blog_update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Başlık</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Blog başlığı girin" value="<?= htmlspecialchars($blog['title']) ?>" required >
                <input type="hidden"id="slug" name="slug" value="<?= htmlspecialchars($blog['slug']) ?>">
            </div>
            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" value="<?= htmlspecialchars($blog['category']) ?>" placeholder="Blog kategori girin" required>
            </div>
            <div class="form-group">
                <label for="summary">Özet</label>
                <textarea class="form-control" id="summary" name="summary" rows="3" placeholder="Kısa bir özet yazın" required><?= htmlspecialchars($blog['summary']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">İçerik</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Blog içeriğini yazın" required><?= htmlspecialchars($blog['content']) ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="read_time">Okuma Süresi (dakika)</label>
                <input type="number" class="form-control" id="read_time" name="read_time" placeholder="Okuma süresini girin" value="<?= htmlspecialchars($blog['read_time']) ?>" required>

                <input type=hidden id="id" name="id" value="<?= htmlspecialchars($blog['id']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Blog Düzenle</button>
        </form>
    </div>



  
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
