<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cek Kosan</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div id="login-pencari" class="login">
        <div class="container">
            <div class="image-container">
                <img src="../img/illustrations.png" id="illustrasions" alt="">
            </div>
            <div class="login-container border-secondary box-shadow">
                <h1 class="text-center text-secondary">Masuk sebagai pencari kost</h1>
                <?php 
                    if(session()->get('fail')){
                        echo '<div class="alert alert-danger" role="alert">
                                '.session()->get('fail').'
                            </div>';
                    }
                    else if(session()->get('success')){
                        echo '<div class="alert alert-success" role="alert">
                                '.session()->get('success').'
                            </div>';
                    }
                ?>
                <form action="../login/pencari" method="post" autocomplete="off">
                    <label class="text-secondary" for="username">username</label>
                    <input id="input-username"type="text" name="username" id="username" required>
                    <label class="text-secondary" for="password">password</label>
                    <input id="input-password" type="password" name="password" id="password" required>
                    <p class="text-secondary">Belum punya akun? <a href="/register">Daftar disini</a></p>
                    <button id="btn-submit" type="submit" value="pencari" name="login" class="btn btn-secondary " disabled>Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
    <script src="../script/login.js"></script>
</html>