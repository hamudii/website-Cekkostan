<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title><?= $kost['nama_kost']; ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="/home">Cari Kostan!!</a>
        </div>
        <div class="navbar-menu">
            <ul>
                <li></i><a href="/pemilik/dashboard">Dashboard</a></li>
                <li><a href="/pemilik/tambah-kost">Tambah Kostan</a></li>
                <li><a href="/pemilik/pesan">Pesanan</a></li>
                <li><i class="fas fa-user"></i> <a href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <div id="detail-kost">
        <div class="container">
            <div class="row mb-3">
                <h1 class="text-center w-100 text-light">Detail Kost</h1>
            </div>
            <div class="row">
                <div class="col-6 img-container">
                    <img src="/img/kost/<?= $kost['gambar']; ?>" alt="<?= $kost['nama_kost']; ?>" width="100%">
                </div>
                <div class="col-6 detail-container">
                    <div class="detail">
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Nama</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <h3><?= $kost['nama_kost']; ?></h3>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Deskripsi</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <p><?= $kost['deskripsi']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Alamat</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <p><?= $kost['alamat_kost']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Total Kamar</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <p><?= $kost['total_kamar']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Sisa Kamar</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <p><?= $kost['sisa_kamar']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h3>Harga</h3>
                            </div>
                            <div class="col-1">
                                <h3>:</h3>
                            </div>
                            <div class="col-8">
                                <?php 
                                    $harga = number_format($kost['harga'], 0, ',', '.');
                                ?>
                                <p><?= 'Rp ' . $harga; ?></p>
                            </div>
                        </div>
                        <div class="row mb-2 button-container">
                            <a href="/pemilik/edit-kost/<?= $kost['id_kost']; ?>" class="btn btn-primary">Edit</a>
                            <a href="/pemilik/delete-kost/<?= $kost['id_kost']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>