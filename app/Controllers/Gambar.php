<?php

// we want to control the data 

namespace App\Controllers;

class Gambar extends BaseController
{
    public function index()
    {

        // LOAD MODEL
        $gambar_pelajar = new \App\Models\GambarPelajar();

        // get all data and store into $gambar
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

        // load form
        helper('form');

        return view('admin/add');
    }

    // save data dari add new form 
    function save_new() {

        // LOAD MODEL
        $gambar_pelajar = new \App\Models\GambarPelajar();

        // modelling data - incoming request input
        // input form 
        // $nama = $this->request->getPost('nama');
        // $kelas = $this->request->getPost('kelas');
        // $tingakatan = $this->request->getPost('tingkatan');

        //dd($nama);

        // keep data request in array 
        $data = [
            'nama' => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'tingkatan' => $this->request->getPost('tingkatan')
        ];

        //upload gambar pelajar 

        $file = $this->request->getFile('nama_fail');

        // check for error 
        // dd($files);

        // grab the file by name given in HTML form
        if ($file) {

            //$file = $files->getFile('nama_fail');

            // generate a new secure name 
            $nama_fail = $file->getRandomName();

            // move the file to it's new home
            $file->move( 'img/',  $nama_fail );

            // echo $file->getSize('mb');       // 1.23
            // echo $file->getExtension();      // jpg
            // echo $file->getType();           //image/jpg

            // label where it will be saved
            $data['nama_fail'] = $nama_fail;

        }

        // insert image into database(gambar_pelajar)
        $gambar_pelajar->insert( $data );
        
    }
}
