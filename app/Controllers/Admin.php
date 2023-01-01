<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pesan;
use App\Models\TesModel;

class Admin extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this -> model = new TesModel();
    }

    // fungsi mengarahkan
    public function formTambah()
    {
        session();
        $dikirim=[
            'title'=>'Tambah Data',
            'validate' => \Config\Services::validation(),
        ];
        return view('/CrudProduct/Create', $dikirim);
    }

    public function formEdit($id = null)
    {
        $data=$this->model->find(['id'=>$id]);
        session();
        $dikirim=[
            'data'=>$data,
            'title'=>'Edit Data',
            'validate' => \Config\Services::validation(),
        ];
        return view('/CrudProduct/Edit', $dikirim);
    }

 //bagian crud untuk admin
    public function funcData()
    {
        
        $currentPage = $this->request->getVar('page_data')? $this->request->getVar('page_data') : 1;

        $dikirim = [
            'title' => 'Data Produk', 
            'data' => $this->model->paginate(5,'data'), 
            'pager'=> $this->model->pager, 
            'currentPage'=>$currentPage,
        ];
        return view('/CrudProduct/Table', $dikirim);
    }

    public function pesan()
    {
        
        $currentPage = $this->request->getVar('page_data')? $this->request->getVar('page_data') : 1;
        $model = new Pesan();
        $dikirim = [
            'title' => 'Pesan client', 
            'data' => $model->paginate(5,'pesan'), 
            'pager'=> $model->pager, 
            'currentPage'=>$currentPage,
        ];
        return view('/CrudProduct/Pesan', $dikirim);
    }

    // fungsi create data
    public function create()
    {
        // $validasi =;
        if(!$this ->validate([
            'gambar' => [
                'rules'=> 'uploaded[gambar]|max_size[gambar,10240]|is_image[gambar]|mime_in[gambar,image/png,image/jpg]',
                'errors'=> [
                    'uploaded' => 'harus upload gambar',
                    'max_size' => 'ukuran maksimal 10 MB',
                    'is_image' => 'yang anda pilih bukan is image',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ],
            'nama' => 'required',
            'harga' => 'required'
        ])){
            return redirect()->to('/Admin/formTambah')->withInput();
        }

            $fileGambar= $this->request->getFile('gambar');//dari input form
            $randomName=$fileGambar->getRandomName();
            $fileGambar->move('images', $randomName);

            $tambah =[//bagian masukkan ke database
                'gambar' => $randomName,
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
                ];

        $this->model->save($tambah);
        session()->setFlashdata('pesan', 'Berhasil ditambahkan');
        return redirect()->to('/Admin/funcData');
    }


    public function update($id = null)
        {
            $val = $this->validate([
                'gambar' => [
                    'rules' => 'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar melebihi 2 MB',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                'nama' => 'required',
                'harga' => 'required'
            ]);
            
            if(!$val){
                return redirect()->to('/Admin/formEdit/'.$id)->withInput();
            }
            $imgUpdate = $this->request->getFile('gambar');

            if($imgUpdate->getError() == 4){
                $namaGambar = $this->request->getVar('imgLama');
            }else{
                // hanya variable untuk unlink
                $imgLama = $this->request->getVar('imgLama');
                // ini yg diambil
                $namaGambar=$imgUpdate->getRandomName();
                $imgUpdate->move('images', $namaGambar);
                if($imgLama!=''){
                    unlink('images/'. $imgLama);
                };
            }
            
            $update =[//bagian masukkan ke database
                'id' => $id,
                'gambar' => $namaGambar,
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
            ];
            session()->setFlashdata('pesan', 'Berhasil update data '.$id);
            $this->model->save($update);
            return redirect()->to('/Admin/funcData');
        }

    public function funcDeleteData($id = null)
    {
        $data = $this->model->find($id);
        // menghapus file di hard disk kita
        if($data['gambar']==''){
            $this->model->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/Admin/funcData');
        }
        unlink('images/'. $data['gambar']);

        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Admin/funcData');
    }

}
