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
    <div id="register-pemilik" class="register">
        <div class="container">
            <div class="register-container border-secondary box-shadow">
                <h1 class=" text-secondary">Daftar Akun</h1>
                <?php
                if(session()->getFlashdata('fail')){
                    echo "<h4 class='text-warning'>".session()->getFlashdata('fail')."</h4>";
                    session()->remove('fail');
                }
                ?>
                <form action="../register" method="post" autocomplete="OFF">
                    <label for="nama lengkap" class="text-secondary">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required>

                    <label for="telp" class="text-secondary">No. Telp</label>
                    <input type="text" name="telp" id="telp" required>

                    <label for="email" class="text-secondary">Email</label>
                    <input type="email" name="email" id="email" required>

                    <label for="jenis" class="text-secondary">Daftar sebagai</label>
                    <select name="akun" id="akun" required>
                        <option value="pemilik">Pemilik Kos</option>
                        <option value="pencari">Pencari Kos</option>
                    </select>

                    <label class="text-secondary" for="username">Username</label>
                    <input id="input-username" type="text" name="username" id="username" required>

                    <label class="text-secondary" for="password">Password</label>
                    <input id="input-password" type="password" name="password" id="password" required>

                    <label class="text-secondary" for="konfirmasi-password">Konfirmasi password</label>
                    <input id="input-password" type="password" name="password2" id="password2" required>

                    <p class="text-secondary">Sudah punya akun? <a href="login.html">Login disini</a></p>
                    <button id="btn-submit" type="submit" name="register" value="register" class="btn btn-secondary ">Daftar</button>
                </form>
            </div>
            <div class="image-container">
                <img src="img/Signing the contract.png" id="illustrasions" alt="">
            </div>
        </div>
    </div>
</body>

</html>