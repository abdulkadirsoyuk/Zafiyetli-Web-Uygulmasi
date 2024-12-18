<?php
session_start();
$userLoggedIn = $_SESSION['user_id'];
include 'includes/db.php';
$username=$_SESSION['username'];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT id, title, slug FROM blogs WHERE user_id = $userLoggedIn ORDER BY created_at DESC";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yazılarım</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php if ($userLoggedIn): ?>
<?php include 'includes/login_header.php'; ?>
<?php else: ?>
    <?php include 'includes/header.php'; ?>
    <?php endif; ?>



    <div class="container my-5">
        <h1 class="text-center mb-4">Yazdığım Bloglar</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Blog Sayısı</th>
                        <th>Başlık</th>
                        <th>Görüntüle</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($blog = $result->fetch_assoc()) {
                            $title = htmlspecialchars($blog['title']);
                            $slug = htmlspecialchars($blog['slug']);
                            $id =$blog['id'];
                            echo "<tr>
                            <td>{$count}</td>
                            <td>{$title}</td>
                            <td><a href='blog_detail.php?slug={$slug}' class='btn btn-info btn-sm'>Görüntüle</a></td>
                            <td><a href='edit_blog.php?id={$id}' class='btn btn-warning btn-sm'>Düzenle</a></td>
                            <td><a href='php/delete_blog.php?id={$id}' class='btn btn-danger btn-sm' onclick=\"return confirm('Bu kaydı silmek istediğinizden emin misiniz?')\">Sil</a></td>
                          </tr>";
                    
                            $count++;
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Blog Bulunamadı.' . $userLoggedIn .' </td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>




<?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>