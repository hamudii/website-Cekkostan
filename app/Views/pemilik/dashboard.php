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

    <!-- Content -->
    <div id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Dashboard Pemilik</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card text-light">
                        <div class="card-header">
                            <?php 
                                if(session()->getFlashdata('success')){
                                    echo '<div class="alert alert-success">';
                                    echo session()->getFlashdata('success');
                                    echo '</div>';
                                }else if(session()->getFlashdata('fail')){
                                    echo '<div class="alert alert-danger">';
                                    echo session()->getFlashdata('fail');
                                    echo '</div>';
                                }
                            ?>
                            <h3>Daftar Kostan</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 50px">No</th>
                                        <th>Gambar</th>
                                        <th>Nama Kostan</th>
                                        <th>Total Kamar</th>
                                        <th>Sisa Kamar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php 
                                        //if kost empty
                                        if(empty($kost)){
                                            echo '<tr>';
                                            echo '<td colspan="7" style="text-align: center;">Kostan belum tersedia</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                    <?php foreach ($kost as $k) : ?>
                                    
                                    <?php 
                                        $harga = number_format($k['harga'], 0, ',', '.');
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $no++; ?></td>
                                        <td><img src="/img/kost/<?= $k['gambar']; ?>" alt="" class="kost-img" style="width: 160px; height: 120px; object-fit:cover; "></td>
                                        <td><?= $k['nama_kost']; ?></td>
                                        <td><?= $k['total_kamar']; ?></td>
                                        <td><?= $k['sisa_kamar']; ?></td>
                                        <td><?= "Rp. $harga"; ?></td>
                                        <td style="width: 200px;">
                                            <a href="/pemilik/edit-kost/<?= $k['id_kost']; ?>" class="btn btn-success">Edit</a>
                                            <a href="/pemilik/delete-kost/<?= $k['id_kost']; ?>" class="btn btn-danger">Hapus</a>
                                            <a href="/pemilik/detail-kost/<?= $k['id_kost']; ?>" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</body>

</html>