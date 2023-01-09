<?php

namespace App\Controllers;

use App\Models\KostModel;
use App\Models\PesanModel;
use App\Models\PencariModel;

class Pesan extends BaseController{
    protected $kostModel;
    protected $pencariModel;
    protected $pesanModel;

    public function __construct(){
        $this->kostModel = new KostModel();
        $this->pencariModel = new PencariModel();
        $this->pesanModel = new PesanModel();
    }

    public function index(){
        $pesan = $this->pesanModel->join('kost', 'kost.id_kost = pesan.id_kost')
                                  ->join('pemilik', 'pemilik.id_pemilik = kost.id_pemilik')
                                  ->join('pencari', 'pencari.id_pencari = pesan.id_pencari')
                                  ->where('pemilik.id_pemilik', session()->get('id_pemilik'))
                                  ->findAll();

        $data = [
            'pesan' => $pesan
        ];
        // dd($data);
        return view('pemilik/pesan', $data);
    }

    public function pencariPesan(){
        $pesan = $this->pesanModel->join('kost', 'kost.id_kost = pesan.id_kost')->where('id_pencari', session()->get('id_pencari'))->findAll();
        $data = [
            'pesan' => $pesan
        ];
        return view('/pencari/pesananku', $data);
    }

    public function detail($id){
        $pesan = $this->pesanModel->where('id_pesan', $id)->first();
        $kost = $this->kostModel->where('id_kost', $pesan['id_kost'])->first();
        $pencari = $this->pencariModel->where('id_pencari', $pesan['id_pencari'])->first();
        $data = [
            'pesan' => $pesan,
            'kost' => $kost,
            'pencari' => $pencari
        ];
        return view('pemilik/detail-pesan', $data);
    }

    public function save($id){
        $kost = $this->kostModel->where('id_kost', $id)->first();
        if($kost['sisa_kamar'] == 0){
            session()->setFlashdata('fail', 'Kamar sudah penuh');
            return redirect()->to("/kost/$id");
        }
        $data = [
            'id_kost' => $id,
            'id_pemilik' => $kost['id_pemilik'],
            'id_pencari' => session()->get('id_pencari'),
            'status' => 'pending',
            'tanggal_pesan' => date('Y-m-d')
        ];
        $this->pesanModel->insert($data);

        //kurangi 1 kamar di database
        $kamar = $kost['sisa_kamar'] - 1;
        $this->kostModel->update($id, ['sisa_kamar' => $kamar]);

        session()->setFlashdata('success', 'Berhasil membuat pesanan');
        return redirect()->to('/pencari/pesananku');
    }

    public function batal($id){
        $pesan = $this->pesanModel->where('id_pesan', $id)->first();
        $kost = $this->kostModel->where('id_kost', $pesan['id_kost'])->first();
        $kamar = $kost['sisa_kamar'] + 1;
        $this->kostModel->update($pesan['id_kost'], ['sisa_kamar' => $kamar]);
        $this->pesanModel->delete($id);
        session()->setFlashdata('success', 'Berhasil membatalkan pesanan');
        return redirect()->to('/pencari/pesananku');
    }

    public function terima($id){
        $this->pesanModel->update($id, ['status' => 'diterima']);
        session()->setFlashdata('success', 'Berhasil menerima pesanan');
        return redirect()->to('/pemilik/pesan');
    }

    public function tolak($id){
        $this->pesanModel->update($id, ['status' => 'ditolak']);
        //tambah 1 kamar di database
        $pesan = $this->pesanModel->where('id_pesan', $id)->first();
        $kost = $this->kostModel->where('id_kost', $pesan['id_kost'])->first();
        $kamar = $kost['sisa_kamar'] + 1;
        $this->kostModel->update($pesan['id_kost'], ['sisa_kamar' => $kamar]);
        session()->setFlashdata('success', 'Berhasil menolak pesanan');
        return redirect()->to('/pemilik/pesan');
    }
}