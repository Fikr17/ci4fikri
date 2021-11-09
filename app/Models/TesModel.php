<?php

namespace App\Models;

use CodeIgniter\Model;

class TesModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['gambar', 'nama', 'harga'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';//sesuaikan dengan database
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

}
