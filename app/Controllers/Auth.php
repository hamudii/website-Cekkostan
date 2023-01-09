<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemilikModel;
use App\Models\PencariModel;

class Auth extends BaseController
{
    public function loginOption()
    {
        return view('login/loginOption');
    }

    public function loginPemilik()
    {
        $data = [];
        helper(['form']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[3]|max_length[32]|validatePemilik[username,password]',
            ];
            $errors = [
                'password' => [
                    'validatePemilik' => 'Email or password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                //get errors msg
                $errors = $this->validator->getErrors();
                session()->setFlashdata('fail', join(" ", $errors));
            } else {
                $model = new PemilikModel();

                $user = $model->where('username_pemilik', $this->request->getVar('username'))->first();
                $this->setPemilikSession($user);
                return redirect()->to('home');
            }
        }
        return view('login/loginPemilik', $data);
    }

    public function loginPencari()
    {
        $data = [];
        helper(['form']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[3]|max_length[32]|validatePencari[username,password]',
            ];
            $errors = [
                'password' => [
                    'validatePencari' => 'Email or password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                //get errors msg
                $errors = $this->validator->getErrors();
                session()->setFlashdata('fail', join(" ", $errors));
            } else {
                $model = new PencariModel();

                $user = $model->where('username_pencari', $this->request->getVar('username'))->first();
                $this->setPencariSession($user);
                return redirect()->to('home');
            }
        }
        return view('login/loginPencari', $data);
    }

    public function setPemilikSession($user)
    {
        $data = [
            'id_pemilik' => $user['id_pemilik'],
            'username_pemilik' => $user['username_pemilik'],
            'nama_pemilik' => $user['nama_pemilik'],
            'email_pemilik' => $user['email_pemilik'],
            'telp_pemilik' => $user['telp_pemilik'],
            'logged_in' => TRUE,
            'role' => 'pemilik'
        ];
        session()->set($data);
        return true;
    }

    public function setPencariSession($user)
    {
        $data = [
            'id_pencari' => $user['id_pencari'],
            'username_pencari' => $user['username_pencari'],
            'nama_pencari' => $user['nama_pencari'],
            'email_pencari' => $user['email_pencari'],
            'telp_pencari' => $user['telp_pencari'],
            'logged_in' => TRUE,
            'role' => 'pencari'
        ];
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        $data = [];
        helper(['form']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules = [
                'nama' => 'trim|required|min_length[3]|max_length[20]',
                'telp' => 'trim|required|min_length[3]|max_length[20]|numeric',
                'email' => 'trim|required|min_length[3]|max_length[100]|valid_email|',
                'username' => 'trim|required|min_length[3]|max_length[20]|',
                'password' => 'trim|required|min_length[3]|max_length[20]|',
                'password2' => 'trim|required|min_length[3]|max_length[20]|matches[password]',
                'akun' => 'required',
            ];
            $errors = [
                'password2' => [
                    'matches' => 'Password don\'t match'
                ],
                'akun' => [
                    'required' => 'Please choose your account'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                //get errors msg
                $errors = $this->validator->getErrors();
                session()->setFlashdata('fail', join(" ", $errors));
                return redirect()->to('/register')->withInput();
            } else {
                $akun = $this->request->getVar('akun');
                
                if($akun == 'pemilik'){
                    $model = new PemilikModel();
                    $data = [
                        'username_pemilik' => $this->request->getVar('username'),
                        'password_pemilik' => $this->request->getVar('password'),
                        'nama_pemilik' => $this->request->getVar('nama'),
                        'email_pemilik' => $this->request->getVar('email'),
                        'telp_pemilik' => $this->request->getVar('telp'),
                    ];
                    $exist = $model->where('username_pemilik', $this->request->getVar('username'))->first();
                    if($exist){
                        session()->setFlashdata('fail', 'Username already exist');
                    }else{
                        if($model->insert($data)){
                            session()->setFlashdata('success', 'Successfully registered');
                            return redirect()->to('login/pemilik');
                        }else{
                            session()->setFlashdata('fail', 'Failed to register');
                        }
                    }
                } else {
                    $model = new PencariModel();
                    $data = [
                        'username_pencari' => $this->request->getVar('username'),
                        'password_pencari' => $this->request->getVar('password'),
                        'nama_pencari' => $this->request->getVar('nama'),
                        'email_pencari' => $this->request->getVar('email'),
                        'telp_pencari' => $this->request->getVar('telp'),
                    ];
                    //if username already exist
                    $exist = $model->where('username_pencari', $this->request->getVar('username'))->first();
                    if($exist){
                        session()->setFlashdata('fail', 'Username already exist');
                    }else{
                        if($model->insert($data)){
                            session()->setFlashdata('success', 'Successfully registered');
                            return redirect()->to('login/pencari');
                        }else{
                            session()->setFlashdata('fail', 'Failed to register');
                        }
                    }
                }
            }
        }
        return view('register/registerForm', $data);
    }
}
