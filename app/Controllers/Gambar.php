<?php

// we want to control the data 

namespace App\Controllers;

class Gambar extends BaseController
{
    public function index()
    {

        $gambar_pelajar = new \App\Models\GambarPelajar();

        $gambar = $gambar_pelajar->findAll();

        // identify the data only compare to dd()
        // show data in array 

        // foreach ( $gambar as $g ) {
        //     echo "<br>";
        //     print_r($g);
        //     echo "<br>";
        // }


        //dd($gambar_pelajar);   //hard to find data only 

        // location in View/admin/listing.php
        //data from $gambar pass to 'gambar' as key 
        // so 'gambar' can be use in listing.php now
        return view('admin/listing' , [ 'gambar' => $gambar ]);
    }

    function edit()
    {
        echo "<h1>Edit pelajar</h1>";
    }

    function add() {
        echo "<h1>Tambah pelajar</h1>";
    }
}
