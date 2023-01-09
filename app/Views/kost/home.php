<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>Cari Kostan!!</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="/home">CekKostan!!</a>
        </div>
        <div class="navbar-menu">
            <ul>
                <li></i><a href="/">Home</a></li>
                <?php 
                    $role = session()->get('role');
                    if($role == 'pemilik'){
                        echo '<li><a href="/pemilik/dashboard">KostKu</a></li>';
                    }else if($role == 'pencari'){
                        echo '<li><a href="/pencari/pesananku">PesananKu</a></li>';
                    }

                ?>
                <?php 
                    $loggedIn = session()->get('logged_in');
                    if($loggedIn){
                        echo '<li><i class="fas fa-user"></i><a href="/logout">Logout</a></li>';
                    }else{
                        echo '<li><i class="fas fa-user"></i><a href="/login">Login</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <header class="header">
        <div class="header-image">
            <img src="img/header.jpg" alt="img" class="img-header">
        </div>
        <div class="header-title">
            <h1 class="text-center">Cek Kostan!!</h1>
            <p class="text-center">Pesan Kost Terbaik di Jatinangor</p>
        </div>
    </header>
    <!-- End Header -->

    <!-- Content -->
    <div class="content-container">
        <div class="content">
            <div class="content-title">
                <h2 class="text-center pt-3 text-light">Rekomendasi</h2>
            </div>
            <div class="content-kost d-flex flex-wrap justify-content-round">
                <!-- Loop 5 Kost -->
                <?php $i = 1 ?>
                <?php foreach ($kost as $k) : ?>
                    <?php
                        if($k['gambar'] == null){
                            $k['gambar'] = 'default-image.jpg';
                        }
                        $harga = number_format($k['harga'], 0, ',', '.');
                    ?>
                    <div class="col-4 card-kost text-light">
                        <div class="card-kost-image">
                            <img src="/img/kost/<?= $k['gambar'] ?>" alt="img" class="img-kost">
                        </div>
                        <div class="card-kost-title mb-1">
                            <h3><?= $k['nama_kost'] ?></h3>
                        </div>
                        <div class="card-kost-alamat mb-1">
                            <h4><i class="fas fa-map-marker-alt"></i> <?= $k['alamat_kost'] ?></h4>
                        </div>
                        <div class="card-kost-price mb-1">
                            <p>Rp. <?= $harga ?> / Bulan</p>
                        </div>
                        <div class="card-kost-button">
                            <a href="/kost/<?= $k['id_kost'] ?>" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                    <?php
                    $i++;
                    if ($i > 5) break;
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="show-all">
                <a href="/all-kost" class="btn btn-primary">Lihat Semua</a>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-copyright">
                <h4 class="text-center text-light">©copyright cki-lopers</h4>
            </div>
            <div class="footer-menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">PesananKu</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>