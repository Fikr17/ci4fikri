<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

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
                'username' => [
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field} harus diisi'
                        ]
                    ] , 
                'password' => [
                    'rules'=>'required|min_length[8]',
                    'errors'=>[
                        'required'=>'{field} harus diisi',
                        'min_length'=>'{field} minimal 8 digit'
                        ]
                    ],
                'email' => [
                    'rules'=> 'required|is_unique[users.email]',
                    'errors'=> [
                        'required'=>'{field} harus diisi.',
                        'is_unique'=>'{field} sudah pernah terdaftar'
                        ]
                    ],
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
        session()->setFlashdata('pesan','Selamat, Anda berhasil Registrasi, silakan login!');
        return redirect()->to('/Home/login');
    }
    

    // fungsi login
    public function login(){
        // validasi input kosong
        if(!$this->validate([
            'email' => [
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'{field} harus diisi.'
                ]
            ],
            'password'=>[
                'rules'=> 'required',
                'errors'=>[
                    'required'=>'{field} harus diisi'
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
                if($data['level']=='admin'){
                    session()->set($data);
                    session()->setFlashdata('pesan','Berhasil Login');
                    return redirect()->to('/Admin/funcData');
                }
                elseif($data['level']=='user'){
                    session()->set($data);
                    session()->setFlashdata('pesan','Berhasil Login');
                    return redirect()->to('/Produk/produk');
                }
        }
        session()->setFlashdata('pesan','Password Salah');
        return redirect()->to('/Home/login')->withInput()->with('validate', $pesanvalidasi);
    }

    
    public function logout(){
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan','Berhasil Logout');
        return redirect()->to('/Home/login');
    }
}