<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cek Kosan</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="login-option" class="login">
        <div class="container">
            <div class="image-container">
                <img src="img/illustrations.png" id="illustrasions" alt="">
            </div>
            <div class="login-container border-secondary box-shadow">
                <h1 class="text-center text-secondary">Masuk Sebagai</h1>
                <?php 
                    if(session()->getFlashdata('fail-role')){
                        echo '<div class="alert alert-danger" role="alert">';
                        echo session()->getFlashdata('fail-role');
                        echo '</div>';
                    }
                ?>
                <a href="login/pemilik" class="btn btn-large btn-secondary hover-animation" style="width: 100%;">Pemilik Kos</a>
                <a href="login/pencari" class="btn btn-large btn-secondary hover-animation" style="width: 100%;">Pencari Kos</a>
            </div>
        </div>
    </div>
</body>

</html>