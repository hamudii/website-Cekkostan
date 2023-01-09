<?php 
    namespace App\Validation;
    use App\Models\PemilikModel as Pemilik;
    use App\Models\PencariModel as Pencari;

    class UserRules{
        public function validatePemilik(string $str, string $fields, array $data){
            $model = new Pemilik();
            $user = $model->where('username_pemilik', $data['username'])->first();
            if(!$user){
                return false;
            }
            $verifyPass = password_verify($data['password'], $user['password_pemilik']);
            if($verifyPass){
                return true;
            }else{
                // dd($user,$data['password'],$user['password_pemilik']);
                return false;
            }
            return false;
        }

        public function validatePencari(string $str, string $fields, array $data){
            $model = new Pencari();
            $user = $model->where('username_pencari', $data['username'])->first();
            if(!$user){
                return false;
            }
            return password_verify($data['password'], $user['password_pencari']);
        }
    }
?>