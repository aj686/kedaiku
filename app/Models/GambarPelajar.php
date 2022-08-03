<?php

// we start connection with database 
// next this model able to handle the data 
// this model with control by Controller with class GambarPelajar

namespace App\Models;

use CodeIgniter\Model;

//GambarPelajar need to be same with GambarPelajar.php (start with Uppercase)
class GambarPelajar extends Model {

    // all information below need to be same with database we created 
    protected $table      = 'gambar';                   
    protected $primaryKey = 'id';                       

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';    //return data in array // or we can choose 'object'
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['nama','nama_fail', 'tingkatan', 'kelas'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

}