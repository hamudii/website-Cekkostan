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
    <div class="pesananku text-light">
        <div class="pesan-container">
            <div class="content-title mb-3">
                <h2 class="text-center pt-3 text-light">PesananKu</h2>
            </div>
            <?php 
                if(session()->getFlashdata('success')){
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('success');
                    echo '</div>';
                }else if(session()->getFlashdata('fail')){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session()->getFlashdata('fail');
                    echo '</div>';
                }
            ?>
            <div class="pesan-list mb-3">
                <h3 class="mb-1">Pesanan Pending</h3>
                <table>
                    <tr>
                        <td class="table-head">No</td>
                        <td class="table-head">Nama Kost</td>
                        <td class="table-head">Tanggal Pesan</td>
                        <td class="table-head">Bayar</td>
                        <td class="table-head">Status</td>
                        <td class="table-head">Aksi</td>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $p) : ?>
                        <?php
                        $harga = number_format($p['harga'], 0, ',', '.');
                        ?>
                        <?php if ($p['status'] == 'pending') : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['nama_kost']; ?></td>
                                <td><?= $p['tanggal_pesan']; ?></td>
                                <td><?= 'Rp. ' . $harga; ?></td>
                                <td><?= $p['status']; ?></td>
                                <td>
                                    <a href="/pesananku/batal/<?= $p['id_pesan']; ?>" class="btn btn-danger">Batal</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="pesan-list mb-3">
                <h3 class="mb-1">Pesanan Diterima</h3>
                <table>
                    <tr>
                        <td class="table-head">No</td>
                        <td class="table-head">Nama Kost</td>
                        <td class="table-head">Tanggal Pesan</td>
                        <td class="table-head">Bayar</td>
                        <td class="table-head">Status</td>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $p) : ?>
                        <?php
                        $harga = number_format($p['harga'], 0, ',', '.');
                        ?>
                        <?php if ($p['status'] == 'diterima') : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['nama_kost']; ?></td>
                                <td><?= $p['tanggal_pesan']; ?></td>
                                <td><?= 'Rp. ' . $harga; ?></td>
                                <td><?= $p['status']; ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="pesan-list">
                <h3 class="mb-1">Pesanan Ditolak</h3>
                <table>
                    <tr>
                        <td class="table-head">No</td>
                        <td class="table-head">Nama Kost</td>
                        <td class="table-head">Tanggal Pesan</td>
                        <td class="table-head">Bayar</td>
                        <td class="table-head">Status</td>
                        <td class="table-head">Aksi</td>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $p) : ?>
                        <?php
                        $harga = number_format($p['harga'], 0, ',', '.');
                        ?>
                        <?php if ($p['status'] == 'ditolak') : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['nama_kost']; ?></td>
                                <td><?= $p['tanggal_pesan']; ?></td>
                                <td><?= 'Rp. ' . $harga; ?></td>
                                <td><?= $p['status']; ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>

</body>

</html>