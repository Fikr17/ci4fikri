<?php 
//nama file helper harus ada _helper. contoh: me_helper.php

use App\Models\UsersModel;

// dari youtube Agung Widhiatmojo
function allow($level){
    $session=\Config\Services::session();
    $email = $session->get('email');
    $tabel= 'users';
    $model= new UsersModel();
    $row  = $model->get_data_login($email, $tabel);
    if($row != NULL){
        if($row->level==$level //parameter difungsi ini digunakan
            ){
            return true;
        }else{
            return false;
        }
    }
}

?>