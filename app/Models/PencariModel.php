<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class PencariModel extends Model
    {
        protected $table = 'pencari';
        protected $primaryKey = 'id_pencari';
        protected $allowedFields = [
            'username_pencari',
            'password_pencari',
            'nama_pencari',
            'email_pencari',
            'telp_pencari'
        ];

        protected $allowCallbacks = true;
        protected $beforeInsert = ['hashPassword'];
        protected $beforeUpdate = ['hashPassword'];

        protected function hashPassword(array $data){
            if(isset($data['data']['password_pencari'])){
                $data['data']['password_pencari'] = password_hash($data['data']['password_pencari'], PASSWORD_DEFAULT);
            }
            return $data;
        }
    }