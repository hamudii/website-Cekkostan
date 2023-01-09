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
    <div id="tambah-kost">
        <div class="container text-light">
            <form action="/pemilik/save" method="post"  enctype="multipart/form-data">
                <h2 class="text-center">Tambah Kost</h2>

                <div class="mb-3">
                    <?php
                    if (session()->getFlashdata('fail')) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo session()->getFlashdata('fail');
                        echo '</div>';
                    }
                    ?>
                </div>

                <label for="nama_kost">Nama Kost</label>
                <input type="text" class="mb-2" name="nama_kost" id="nama_kost" placeholder="Nama Kost" required>

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="mb-2" id="deskripsi" cols="15" rows="5" placeholder="Deskripsi" required></textarea>

                <label for="alamat_kost">Alamat Kost</label>
                <input type="text" class="mb-2" name="alamat_kost" id="alamat_kost" placeholder="Alamat Kost" required>

                <label for="harga">Harga Kost</label>
                <input type="number" class="mb-2" name="harga" id="harga" placeholder="Harga Kost" required>

                <div class="input-kamar">
                    <div class="total-kamar row mb-2">
                        <label for="total_kamar" class="col-3">Total Kamar</label>
                        <input type="number" name="total_kamar" id="total_kamar" placeholder="Total Kamar" required>
                    </div>
                    <div class="sisa-kamar row mb-2">
                        <label for="sisa_kamar" class="col-3">Sisa Kamar</label>
                        <input type="number" name="sisa_kamar" id="sisa_kamar" placeholder="Sisa Kamar" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gambar" class="form-label">Gambar Kamar</label>
                    <div class="row">
                        <div class="col-3">
                            <img src="/img/default-image.jpg" alt="" class="img-thumbnail img-preview" width="200px" height="150px">
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    <!-- End Content -->

    <!-- Script preview -->
    <script>
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        gambar.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    imgPreview.src = reader.result;
                });
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>