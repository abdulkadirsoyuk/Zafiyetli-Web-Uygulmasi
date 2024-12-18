<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
include 'includes/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user_id = $userLoggedIn;
    $blog_slug = $_GET['slug'];

    
    $sql = "SELECT * FROM blogs WHERE slug = '$blog_slug'";
    $result = $conn->query($sql);

}
$sqlcom = "SELECT * FROM comments WHERE blog_slug = '$blog_slug'";
    $resultcom = $conn->query($sqlcom);
$blog = $result->fetch_assoc();

$sql = "SELECT id, title, summary, content, image_path, created_at, user_id, slug, category, read_time 
        FROM blogs 
        ORDER BY created_at DESC";
    $result = $conn->query($sql);
    

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($blog['title']) ?></title>
    <link rel="stylesheet" href="assets/styles/comment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php if ($userLoggedIn): ?>
<?php include 'includes/login_header.php'; ?>
<?php else: ?>
    <?php include 'includes/header.php'; ?>
    <?php endif; ?>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3"><?= htmlspecialchars($blog['title']) ?></h1>
                
                <h5>Kategori: <?= htmlspecialchars($blog['category']) ?></h5>
                <p>Okuma Süresi: <?= htmlspecialchars($blog['read_time']) ?> dakika</p>
                <p class="text-muted">Yazar: <strong><?= htmlspecialchars($blog['username']) ?></strong> </p>
                <hr>
                <p class="lead">
                <?= htmlspecialchars($blog['summary']) ?>
                </p>
                <img src="uploads/<?= htmlspecialchars($blog['image_path']) ?>" alt="Blog Görseli" class="img-fluid mb-4">
                <p class="lead">
                <?= htmlspecialchars($blog['content']) ?>
                </p>
               


                <div class="comment-section">
    <h3>Yorumlar</h3>
    <ul class="comment-list">
    <?php if ($resultcom->num_rows > 0): ?>
        <?php while ($row = $resultcom->fetch_assoc()): ?>
        <li class="comment">
       
        <?= $row['content']; ?> 

                </li>
               
            <?php endwhile; ?>
        <?php else: ?>
            <li class="comment">Henüz yorum yapılmamış.</li>
        <?php endif; ?>
    </ul>
    <form action="php/add_blog.php" class="comment-form" method="POST">
    <h2>Yorumunuzu Ekleyin</h2>
    <textarea name="content" placeholder="Yorumunuzu buraya yazın..." required></textarea>
    <input type="hidden" name="blog_id" value="<?= htmlspecialchars($blog['id']) ?>">
    <input type="hidden" name="blog_slug" value="<?= htmlspecialchars($blog['slug']) ?>">
    <button type="submit">Gönder</button>
</form>

        </div>

                
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Diğer Bloglar
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        
                        <li class="list-group-item"><a href="blog_detail.php?slug=<?= htmlspecialchars($row['slug']) ?>"><?= htmlspecialchars($row['title']) ?></a></li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="no-blogs">Henüz blog yazısı bulunmuyor.</p>
                        <?php endif; ?>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

  
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
