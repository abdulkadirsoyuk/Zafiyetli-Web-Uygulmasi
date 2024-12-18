<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
include 'includes/db.php';
$sql = "SELECT id, title, summary, content, image_path, created_at, user_id, slug, category, read_time 
        FROM blogs 
        ORDER BY created_at DESC";
    $result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa | Bloglar</title>
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php if ($userLoggedIn): ?>
<?php include 'includes/login_header.php'; ?>
<?php else: ?>
    <?php include 'includes/header.php'; ?>
    <?php endif; ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Son Yazılar</h1>
    <div class="row justify-content-center">
       
       <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
           
                <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card" style="width: 100%;">
                            <img src="uploads/<?= htmlspecialchars($row['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['image_path']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row['summary']) ?></p>
                                <a href="blog_detail.php?slug=<?= htmlspecialchars($row['slug']) ?>" class="btn btn-primary">Devamını oku</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p class="no-blogs">Henüz blog yazısı bulunmuyor.</p>
                        <?php endif; ?>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>