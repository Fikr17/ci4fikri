<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\AuthModel;

class Auth extends BaseController
{

    protected $model;
    public function __construct()
    {
        $this->model = new UsersModel();
    }

    //fungsi registrasi
    public function funcRegister(){
        $val = $this->validate(
            [
                'username' => 'required|is_unique[users.username]', 
                'email' => 'required|is_unique[users.EMAIL]',
                'password' => 'required|min_length[8]',
            ],
          );
        if(!$val){
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/Home/register')->withInput()->with('validate',$pesanvalidasi);
            }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        ];
        $this->model->insert($data);
        session()->setFlashdata('pesan','Selamat Anda berhasil Registrasi, silakan login!');
        return redirect()->to('/Home/login');
    }
    

    // fungsi login
    public function login(){
        // validasi input kosong
        if(!$this->validate([
            'email' => [
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'{field} email harus diisi.'
                ]
            ],
            'password'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'{field} password harus diisi'
                ]
                ],
        ]))
        {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('Home/login')->withInput()->with('validate',$pesanvalidasi);
        };

        $pesanvalidasi = \Config\Services::validation();
        $table = 'users';
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $row = $this->model->get_data_login($email,$table);
        // dd($row);

        if ($row == NULL){
            session()->setFlashdata('pesan','email anda salah');
            return redirect()->to('/Home/login')->withInput()->with('validate', $pesanvalidasi);
        }
        if (password_verify($password,$row->password)){
                $data = array(
                    'log' => TRUE,
                    'username' => $row->username,
                    'email' => $row->email,
                    'level' => $row->level,
                );
                session()->set($data);
                session()->setFlashdata('pesan','Berhasil Login');
                return redirect()->to('/Home/produk');
        }
        session()->setFlashdata('pesan','Password Salah');
        return redirect()->to('/Home/login')->withInput()->with('validate', $pesanvalidasi);
    }

}