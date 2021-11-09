<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TesModel;

class Produk extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model=new TesModel();
    }

    // data produk setelah login
    public function produk()//halaman product
    {
        session();
        $base=$this->model->findAll();
        $dikirim=[
            'data'=>$base,
            'title'=>'Produk Kami'
        ];
        return view('/Pages/Product', $dikirim);
    }
}
