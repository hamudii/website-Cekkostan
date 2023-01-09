<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class KostModel extends Model
    {
        protected $table = 'kost';
        protected $primaryKey = 'id_kost';
        protected $allowedFields = [
            'nama_kost',
            'alamat_kost',
            'deskripsi',
            'harga',
            'total_kamar',
            'sisa_kamar',
            'id_pemilik',
            'gambar'
        ];
    }