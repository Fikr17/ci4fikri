<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TesModel;

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
        $dikirim=[
            'title'=>'Home'
        ];
        return view('/Pages/Home', $dikirim);//ini layout yang bener
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

//bagian product
    public function produk()//halaman product
    {
        $base=$this->model->findAll();
        $dikirim=[
            'data'=>$base,
            'title'=>'Produk Kami'
        ];
        return view('/Pages/Product', $dikirim);
    }
}
