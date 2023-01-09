<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
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
                if ($role == 'pemilik') {
                    echo '<li><a href="/pemilik/dashboard">KostKu</a></li>';
                } else if ($role == 'pencari') {
                    echo '<li><a href="/pencari/pesananku">PesananKu</a></li>';
                }

                ?>
                <?php
                $loggedIn = session()->get('logged_in');
                if ($loggedIn) {
                    echo '<li><i class="fas fa-user"></i><a href="/logout">Logout</a></li>';
                } else {
                    echo '<li><i class="fas fa-user"></i><a href="/login">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <div class="content-container">
        <div class="content">
            <div class="content-title">
                <h2 class="text-center pt-3 text-light">Detail Kost</h2>
            </div>
            <div class="content-kost d-flex justify-content-center">
                <!-- Loop 5 Kost -->
                <div class="detail text-light">
                    <div class="image-kost fill">
                        <img src="/img/kost/<?= $kost['gambar'] ?>" alt="img" class="img-kost">
                    </div>
                    <div class="row d-flex justify-content-between mt-3 mb-3 detail-container">
                        <div class="detail-kost col-7">
                            <h2 class="kost-title mb-1"><?= $kost['nama_kost'] ?></h2>
                            <h3 class="kost-alamat mb-3"><i class="fas fa-map-marker-alt i-alamat"></i> <?= $kost['alamat_kost'] ?></h3>
                            <div class="row kost-total-kamar mb-1">
                                <div class="col-4">
                                    <h4><i class="fas fa-bed"></i> Total Kamar</h4>
                                </div>
                                <div class="col-4">
                                    <h4>: <?= $kost['total_kamar'] ?></h4>
                                </div>
                            </div>
                            <div class="row kost-sisa-kamar mb-3">
                                <div class="col-4">
                                    <h4><i class="fas fa-bed"></i> Sisa Kamar</h4>
                                </div>
                                <div class="col-4">
                                    <h4>: <?= $kost['sisa_kamar'] ?></h4>
                                </div>
                            </div>
                            <div class="kost-deskripsi mb-1">
                                <h4><i class="fas fa-info-circle"></i> Deskripsi</h4>
                                <p class="deskripsi-content"><?= $kost['deskripsi'] ?></p>
                            </div>
                        </div>
                        <div class="detail-pesan col-4 align-start">
                            <?php
                            $harga = number_format($kost['harga'], 0, ',', '.');
                            ?>
                            <h3 class="kost-harga mb-3">Rp. <?= $harga ?> / Bulan</h3>
                            <a href="/pesan/kost/<?= $kost['id_kost']; ?>" class="btn btn-success w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="detail-pemilik col-7">
                            <h3 class="mb-2">Detail Pemilik</h3>
                            <div class="row">
                                <div class="col-3">
                                    <i class="fas fa-user-circle user-icon"></i>
                                </div>
                                <div class="col-8">
                                    <h4 class="nama-pemilik"><?= $pemilik['nama_pemilik'] ?></h4>
                                    <h5 class="no-telp"><?= $pemilik['telp_pemilik'] ?></h5>
                                    <h5 class="email"><?= $pemilik['email_pemilik'] ?></h5>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
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
    <?php
    if (session()->get('fail')) {
        echo '<script>alert("' . session()->get('fail') . '")</script>';
        session()->remove('fail');
    }
    ?>
</body>

</html>