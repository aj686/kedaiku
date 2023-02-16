<?php

// we start connection with database 
// next this model able to handle the data 
// this model with control by Controller with class GambarPelajar

namespace App\Models;

use CodeIgniter\Model;

//GambarPelajar need to be same with GambarPelajar.php (start with Uppercase)
class KategoriModel extends Model {

    // all information below need to be same with database we created 
    protected $table      = 'kategori';                   
    protected $primaryKey = 'id';                       

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';    // return data in array // or we can choose 'object'
    //protected $useSoftDeletes = true;       // mark some records as deleted without actual erasure from the database

    protected $allowedFields = ['nama'];   // name in table we create

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;   

    function dropdown() {
        $kategori = $this->findAll();
        $to_return = [ '' => 'Sila Pilih Kategori' ];

        foreach($kategori as $kat) {
            $to_return[ $kat['id'] ] = $kat['nama'] ;
        }

        return $to_return;
    }

}