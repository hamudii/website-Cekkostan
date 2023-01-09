<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class PesanModel extends Model
    {
        protected $table = 'pesan';
        protected $primaryKey = 'id_pesan';
        protected $allowedFields = [
            'status',
            'id_pencari',
            'id_kost',
            'tanggal_pesan',
        ];
    }