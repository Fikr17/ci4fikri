<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TesModel;

class Admin extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this -> model = new TesModel();
    }
    public function formTambah()
    {
        $dikirim=[
            'title'=>'Tambah Data'
        ];
        return view('/CrudProduct/Create', $dikirim);
    }

 //bagian crud untuk admin
    public function index()
    {
        // $this-> model sama dengan $model = new TesModel(); tanpa construct
        $data = $this->model->findAll();
        d($data);
        //kirim data lewat seperti $_get
        $dikirim = [
            'title' => 'Tabel', //berhasil
            'data' => $data //data adalah nama table di database
        ];
        return view('/CrudProduct/Table', $dikirim);
    }

    public function create()
    {
        $validasi =[
            'gambar' => 'required',
            'nama' => 'required',//<-tambahan agar tidak boleh sama|is_unique [data.nama]
            'asal' => 'required'
        ];
        $tambah =[//bagian masukkan ke database
            'gambar' => $this->request->getVar('gambar'),
            'nama' => $this->request->getVar('nama'),
            'asal' => $this->request->getVar('asal'),
        ];

        if(!$this ->validate($validasi)){
            $validation = \Config\Services::validation(); //ini cara cek validasi berjalan tidak
            // d($validation);
            // return $this->validator->getErrors();//ini bener stop agar data tidak masuk ke database. tapi bagaimana menampilkan pesan
            return redirect()->to('/Home/tambah')->withInput()->with('validation', $validation);
        }
        
        $this->model->save($tambah);//sudah bisa
        return redirect()->to('/');
    }

    public function detail($id = null)
    {
        //
    }

    public function update($id = null)//berhasil edit
    {
        helper(['form']);
        $rules =[
            'gambar' => 'required',
            'nama' => 'required',//<-tambahan agar tidak boleh sama|is_unique [data.nama]
            'asal' => 'required'
        ];
        $tambah =[//bagian masukkan ke database
            'gambar' => $this->request->getVar('gambar'),
            'nama' => $this->request->getVar('nama'),
            'asal' => $this->request->getVar('asal'),
        ];

        $this->model->update($id, $tambah);
        
        //return redirect()->to('/');
    }

    public function delete($id = null)
    {
        //
    }
}
