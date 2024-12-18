<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Hesap Oluştur</h5>
                </div>
                <div class="card-body">
                    <form action="php/register_process.php" method="POST">
                        <div class="form-group">
                            <label for="username">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adınızı girin" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-posta</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresinizi girin" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Parola</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Parolanızı girin" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Parola Tekrarı</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Parolanızı tekrar girin" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                    </form>
                </div>
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
