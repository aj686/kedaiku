<?php

// we want to control the data 

namespace App\Controllers;

use CodeIgniter\Router\Exceptions\RedirectException;

class Produk extends BaseController
{   

    var $produk_img_lokasi = 'img/produk';

    //firstly run before other so we don't need to paste to other function below
    //__contstruct() is automatically call this function when object created from class 
    function __construct()
    {
        //defined $session library of codeigniter
        $this->session = \Config\Services::session();

        // LOAD MODEL
        $this->produk_model = new \App\Models\ProdukModel();
        $this->kategori_model = new \App\Models\KategoriModel();
    }

    //homepage 
    function homepage() {

        $kategori = $this->kategori_model->dropdown(); 

        $data = [
            'produk' => $this->produk_model->orderBy('id', 'desc')->paginate(10),
            'pager' => $this->produk_model->pager,
            'produk_img_lokasi' => $this->produk_img_lokasi,
            'kategori' => $kategori
            
        ];

        // view name need same with 'produk_homepage.php in View folder
        // $data will past the data to produk_homepage 
        return view('produk_homepage', $data);
    }

    // listing page 
    public function index()
    {
        $kategori = $this->kategori_model->dropdown(); 

        // get all data and store into $gambar
        //$gambar = $this->produk_model->findAll();

        // pagination data with latest data
        $data = [
            'produk' => $this->produk_model->orderBy('id', 'desc')->paginate(10),
            'pager' => $this->produk_model->pager,
            'kategori' => $kategori
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

        return view('admin_produk/listing' , $data );
    }

    // boleh dapatkan id di url as paramater dalam function 
    function edit($id)
    {   
        // load form   --> this counter error for 'call to undefined function form_open_multiport()
        helper('form');

        // get id from url and store into $gambar 
        $produk = $this->produk_model->find( $id ); 

        $kategori = $this->kategori_model->dropdown(); 

        // pass to new variable in view section 
        return view('admin_produk/edit', [
            'kategori' => $kategori,
            'produk' => $produk,
            'produk_img_lokasi' => $this->produk_img_lokasi

        ]);
    }


    // slug -> display slug with name of item in url
    // add slug table of each item with own name that will display in url .admin_produk/edit/slug/own name 
    // etc 'http://kedaiku.test/produk/slug/nikecase'

    function slug($slug) {
        $produk = $produk = $this->produk_model->where( 'slug', $slug )->first(); 
        return view('admin_produk/edit', [
            'produk' => $produk,
            'produk_img_lokasi' => $this->produk_img_lokasi
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

        // user choose, then kategori add into $data as array
        if ($this->request->getPost('kategori_id') != 0) {
            $data['kategori_id'] = $this->request->getPost('kategori_id');
        }

        //upload gambar pelajar 
        $file = $this->request->getFile('gambar');

        // check for error 
        // dd($files);

        // grab the file by name given in HTML form
        if ($file->isReadable()) {

            //$file = $files->getFile('nama_fail');

            // generate a new secure name 
            $gambar = $file->getRandomName();

            // move the file to it's new home
            $file->move( $this->produk_img_lokasi,  $gambar );

            // echo $file->getSize('mb');       // 1.23
            // echo $file->getExtension();      // jpg
            // echo $file->getType();           //image/jpg

            // label where it will be saved
            $data['gambar'] = $gambar;

        }

        // save image into database(produk_model)
        $this->produk_model->update( $id, $data );

        //session for alert success add new data ridirect
        
        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/produk/edit/'. $id);
    }

    function add() {

        // load form
        helper('form');

        $kategori = $this->kategori_model->dropdown();

        return view('admin_produk/add', ['kategori' => $kategori]);
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

        // user choose, then kategori add into $data as array
        if ($this->request->getPost('kategori_id') != 0) {
            $data['kategori_id'] = $this->request->getPost('kategori_id');
        }

        //upload gambar pelajar 

        $file = $this->request->getFile('gambar');

        // check for error 
        // dd($files);

        // grab the file by name given in HTML form
        if ($file->isReadable()) {

            //$file = $files->getFile('nama_fail');

            // generate a new secure name 
            $fail_gambar = $file->getRandomName();

            // move the file to it's new home
            $file->move( $this->produk_img_lokasi,  $fail_gambar );

            // echo $file->getSize('mb');       // 1.23
            // echo $file->getExtension();      // jpg
            // echo $file->getType();           //image/jpg

            // label where it will be saved
            // $data['gambar'] same with database table name 
            $data['gambar'] = $fail_gambar;

        }

        // insert image into database(produk_model)
        $this->produk_model->insert( $data );

        //session for alert success add new data ridirect

        //$_SESSION set to be true 
        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');

        //after success it redirect change the method to listing.php 
        return redirect()->to('/produk');


    }

    function delete( $id ) {

        $this->produk_model->where( 'id', $id )->delete();
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
