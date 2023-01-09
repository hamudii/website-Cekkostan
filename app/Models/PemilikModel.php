<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class PemilikModel extends Model
    {
        protected $table = 'pemilik';
        protected $primaryKey = 'id_pemilik';
        protected $allowedFields = [
            'username_pemilik',
            'password_pemilik',
            'nama_pemilik',
            'email_pemilik',
            'telp_pemilik'
        ];

        protected $allowCallbacks = true;
        protected $beforeInsert = ['hashPassword'];
        protected $beforeUpdate = ['hashPassword'];

        protected function hashPassword(array $data){
            if(isset($data['data']['password_pemilik'])){
                $data['data']['password_pemilik'] = password_hash($data['data']['password_pemilik'], PASSWORD_DEFAULT);
            }
            return $data;
        }
    }