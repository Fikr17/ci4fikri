<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TesModel;
use App\Models\Pesan;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    protected $model;
    public function __construct()
    {
        $this->model = new TesModel();
    }

    // halaman statis
    public function coffee(){
        session();
        $dikirim=[
            'title'=>'Home'
        ];
        return view('/Pages/Home', $dikirim);//ini layout yang bener
    }
    public function post(){
        $post=[
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('pesan'),
        ];
        $model = new Pesan();
        $model->save($post);
        return redirect()->to('/');//ini layout yang bener
    }
    public function login(){
        session();
        $data=[
            'title' => 'Login',
            'validate' => \Config\Services::validation()
        ];
        return view('/Pages/Users/Login', $data);
    }
    public function register(){
        session();
        $data=[
            'title'=>'Register',
            'validate' => \Config\Services::validation(),
        ];
        return view('/Pages/Users/Register', $data);
    }


}
