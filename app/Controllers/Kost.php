<?php

namespace App\Controllers;

use App\Models\KostModel;
use App\Models\PemilikModel;

class Kost extends BaseController
{
    protected $kostModel;
    protected $pemilikModel;

    public function __construct()
    {
        $this->kostModel = new KostModel();
        $this->pemilikModel = new PemilikModel();
    }

    public function index()
    {
        $kost = $this->kostModel->orderBy('id_kost', 'DESC')->findAll();

        $data = [
            'kost' => $kost
        ];
        return view('kost/home', $data);
    }

    public function all(){
        $kost = $this->kostModel->orderBy('id_kost', 'DESC')->findAll();

        $data = [
            'kost' => $kost
        ];
        return view('kost/all-kost', $data);
    }

    public function dashboard()
    {
        $kost = $this->kostModel->where('id_pemilik', session()->get('id_pemilik'))->findAll();
        $data = [
            'kost' => $kost
        ];
        return view('pemilik/dashboard', $data);
    }

    public function create()
    {
        return view('pemilik/tambah-kost');
    }

    public function save()
    {
        if (session()->get('role') != 'pemilik') {
            return redirect()->to('/');
        }

        $rules = [
            'nama_kost' => 'trim|required|max_length[255]',
            'alamat_kost' => 'trim|required|max_length[255]',
            'deskripsi' => 'trim',
            'harga' => 'required|numeric',
            'total_kamar' => 'required|numeric',
            'sisa_kamar' => 'required|numeric',
            'gambar' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];
        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('fail', join(" ", $errors));
            return redirect()->to('/pemilik/tambah-kost')->withInput();
        } else if($this->request->getVar('sisa_kamar') > $this->request->getVar('total_kamar')){
            session()->setFlashdata('fail', 'Sisa kamar tidak boleh lebih dari total kamar');
            return redirect()->to('/pemilik/tambah-kost')->withInput();
        } else {
            $judul = $this->request->getVar('nama_kost');
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = url_title($judul, '-', true) . '.' . $fileGambar->getClientExtension();
            $fileGambar->move('img/kost', $namaGambar);
            $data = [
                'nama_kost' => $this->request->getVar('nama_kost'),
                'alamat_kost' => $this->request->getVar('alamat_kost'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'harga' => $this->request->getVar('harga'),
                'total_kamar' => $this->request->getVar('total_kamar'),
                'sisa_kamar' => $this->request->getVar('sisa_kamar'),
                'id_pemilik' => session()->get('id_pemilik'),
                'gambar' => $namaGambar
            ];
            $this->kostModel->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/pemilik');
        }
    }

    public function delete($id)
    {
        $kost = $this->kostModel->find($id);
        //unlink img
        unlink('img/kost/' . $kost['gambar']);
        $this->kostModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/pemilik/dashboard');
    }

    public function edit($id)
    {
        $kost = $this->kostModel->where('id_pemilik', session()->get('id_pemilik'))->find($id);
        $data = [
            'kost' => $kost
        ];
        return view('pemilik/edit-kost', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_kost' => 'trim|required|max_length[255]',
            'alamat_kost' => 'trim|required|max_length[255]',
            'deskripsi' => 'trim',
            'harga' => 'required|numeric',
            'total_kamar' => 'required|numeric',
            'sisa_kamar' => 'required|numeric',
            'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];
        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('fail', join(" ", $errors));
            return redirect()->to('/pemilik/edit-kost/' . $id)->withInput();
        } else {
            $judul = $this->request->getVar('nama_kost');
            $fileGambar = $this->request->getFile('gambar');
            $getKost = $this->kostModel->find($id);
            $gambarLama = $getKost['gambar'];
            if ($fileGambar->getError() == 4) {
                $namaGambar = $gambarLama; //jika tidak ada gambar yang diupload
            } else {
                if ($gambarLama != 'default.jpg') {
                    unlink('img/kost/' . $gambarLama);
                }
                $namaGambar = url_title($judul, '-', true) . '.' . $fileGambar->getClientExtension();
                $fileGambar->move('img/kost', $namaGambar);
            }
            $data = [
                'nama_kost' => $this->request->getVar('nama_kost'),
                'alamat_kost' => $this->request->getVar('alamat_kost'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'harga' => $this->request->getVar('harga'),
                'total_kamar' => $this->request->getVar('total_kamar'),
                'sisa_kamar' => $this->request->getVar('sisa_kamar'),
                'id_pemilik' => session()->get('id_pemilik'),
                'gambar' => $namaGambar
            ];
            $this->kostModel->update($id, $data);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/pemilik/dashboard');
        }
    }

    public function detail($id){
        $kost = $this->kostModel->where('id_pemilik', session()->get('id_pemilik'))->find($id);
        if(empty($kost)){
            session()->setFlashdata('fail', 'Data tidak ditemukan');
            return redirect()->to('/pemilik/dashboard');
        }
        $data = [
            'kost' => $kost
        ];
        return view('pemilik/detail-kost', $data);
    }

    public function full_detail($id){
        $kost = $this->kostModel->find($id);
        $pemilik = $this->pemilikModel->find($kost['id_pemilik']);
        $data = [
            'kost' => $kost,
            'pemilik' => $pemilik
        ];
        return view('/kost/kost-detail', $data);
    }
}
