<?php

// we want to control the data 

namespace App\Controllers;

class Gambar extends BaseController
{   

    //firstly run before other so we don't need to paste to other function below
    //__contstruct() is automatically call this function when object created from class 
    function __construct()
    {
        //defined $session library of codeigniter
        $this->session = \Config\Services::session();
    }



    public function index()
    {
    
        // LOAD MODEL
        $gambar_pelajar = new \App\Models\GambarPelajar();

        // get all data and store into $gambar
        //$gambar = $gambar_pelajar->findAll();

        // pagination data with latest data
        $data = [
            'gambar' => $gambar_pelajar->orderBy('id', 'desc')->paginate(3),
            'pager' => $gambar_pelajar->pager,
        ];


        // identify the data only compare to dd()
        // show data in array 

        // foreach ( $gambar as $g ) {
        //     echo "<br>";
        //     print_r($g);
        //     echo "<br>";
        // }


        //dd($gambar_pelajar);   //hard to find data only 

        // location in View/admin/listing.php
        //data from $gambar(variable) pass to 'gambar' as key 
        // so 'gambar' can be use in listing.php now
        //return view('admin/listing' , [ 'gambar' => $gambar ]);

        return view('admin/listing' , $data );
    }

    // boleh dapatkan id di url as paramater dalam function 
    function edit($id)
    {   
        // load form   --> this counter error for 'call to undefined function form_open_multiport()
        helper('form');

        // GET LOAD MODEL
        $gambar_pelajar = new \App\Models\GambarPelajar();

        // get id from url and store into $gambar 
        $gambar = $gambar_pelajar->find( $id );


        return view('admin/edit', ['gambar' => $gambar]);
    }

    function save_edit($id) {

        //routing with id  -- USE MODELLING/CODEIGNITER CLASS/UPDATE -> DOCS 

        // GET LOAD MODEL
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

        // save image into database(gambar_pelajar)
        $gambar_pelajar->update( $id, $data );

        //session for alert success add new data ridirect
        
        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/gambar/edit/'. $id);
    }

    function add() {

        // load form
        helper('form');

        return view('admin/add');
    }

    // save data dari add new form 
    function save_new() {

        // GET LOAD MODEL
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

        //session for alert success add new data ridirect

        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/gambar');


    }
}
