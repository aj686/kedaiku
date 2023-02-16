<?php

// we want to control the data 

namespace App\Controllers;

use CodeIgniter\Router\Exceptions\RedirectException;

class Kategori extends BaseController
{   

    //firstly run before other so we don't need to paste to other function below
    //__contstruct() is automatically call this function when object created from class 
    function __construct()
    {
        //defined $session library of codeigniter
        $this->session = \Config\Services::session();

        // LOAD MODEL
        $this->kategori_model = new \App\Models\KategoriModel();
    }

    

    // listing page 
    public function index()
    {
    

        // get all data and store into $gambar
        //$gambar = $this->kategori_model->findAll();

        // pagination data with latest data
        $data = [
            'kategori' => $this->kategori_model->orderBy('id', 'asc')->paginate(10),
            'pager' => $this->kategori_model->pager,
        ];


        // identify the data only compare to dd()
        // show data in array 

        // foreach ( $gambar as $g ) {
        //     echo "<br>";
        //     print_r($g);
        //     echo "<br>";
        // }


        //dd($produk_model);   //hard to find data only 

        // location in View/admin/listing.php
        //data from $gambar(variable) pass to 'gambar' as key 
        // so 'gambar' can be use in listing.php now
        //return view('admin/listing' , [ 'gambar' => $gambar ]);

        return view('admin_kategori/listing' , $data );
    }

    // boleh dapatkan id di url as paramater dalam function 
    function edit($id)
    {   
        // load form   --> this counter error for 'call to undefined function form_open_multiport()
        helper('form');

        // get id from url and store into $gambar 
        $kategori = $this->kategori_model->find( $id ); 


        return view('admin_kategori/edit', [
            'kategori' => $kategori
        ]);
    }


    // slug -> display slug with name of item in url
    // add slug table of each item with own name that will display in url .admin_kategori/edit/slug/own name 
    // etc 'http://kedaiku.test/produk/slug/nikecase'

    function slug($slug) {
        $kategori = $this->kategori_model->where( 'slug', $slug )->first(); 
        return view('admin_kategori/edit', [
            'kategori' => $kategori
        ]);
    }

    function save_edit($id) {

        //routing with id  -- USE MODELLING/CODEIGNITER CLASS/UPDATE -> DOCS 

        // modelling data - incoming request input
        // input form 
        // $nama = $this->request->getPost('nama');
        // $kelas = $this->request->getPost('kelas');
        // $tingakatan = $this->request->getPost('tingkatan');

        //dd($nama);

        // keep data request in array 
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'keterangan' => $this->request->getPost('keterangan')
            
        ];


        // save image into database(produk_model)
        $this->kategori_model->update( $id, $data );

        //session for alert success add new data ridirect
        
        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/kategori/edit/'. $id);
    }

    function add() {

        // load form
        helper('form');

        return view('admin_kategori/add');
    }

    // save data dari add new form 
    function save_new() {


        // modelling data - incoming request input
        // input form 
        // $nama = $this->request->getPost('nama');
        // $kelas = $this->request->getPost('kelas');
        // $tingakatan = $this->request->getPost('tingkatan');

        //dd($nama);

        // keep data request in array 
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'keterangan' => $this->request->getPost('keterangan')
            
        ];

        // insert image into database(produk_model)
        $this->kategori_model->insert( $data );

        //session for alert success add new data ridirect

        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/kategori');


    }

    function delete( $id ) {

        $this->kategori_model->where( 'id', $id )->delete();
        //session for alert success add new data ridirect

        //$_SESSION set to be true 
        $_SESSION['deleted'] = true;
        $this->session->markAsFlashData('deleted');

        return redirect()->back();
    }

    // function cart() {
    //     $_SESSION['cart'] = [
    //         'barang' => [
    //             [
    //                 'id' => 1,
    //                 'nama' => 'Lastik',
    //                 'harga' => '10.00',
    //                 'kuantiti' => 2
    //             ],
    
    //             [
    //                 'id' => 2,
    //                 'nama' => 'Plastik',
    //                 'harga' => '50.00',
    //                 'kuantiti' => 5
    //             ],
                
    //             [
    //                 'id' => 3,
    //                 'nama' => 'Jam',
    //                 'harga' => '29.00',
    //                 'kuantiti' => 10
    //             ],

    //             [
    //                 'id' => 4,
    //                 'nama' => 'Baju',
    //                 'harga' => '100.00',
    //                 'kuantiti' => 1
    //             ]
    //         ]
    //     ];
    //     return view ('bakul');
    // }
}
