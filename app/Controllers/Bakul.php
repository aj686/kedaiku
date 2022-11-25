<?php

// we want to control the data 

namespace App\Controllers;

use CodeIgniter\Router\Exceptions\RedirectException;

class Bakul extends BaseController
{  
    
    // initial execution 
    function __construct() {
        // LOAD MODEL(database) to $this->produk_model
        $this->produk_model = new \App\Models\ProdukModel(); 
        
        //defined $session library of codeigniter
        $this->session = \Config\Services::session();
    }

    // /bakul controller --> display barang in cart pages 
    public function index() {

        
         return view('bakul');
    }

    // create method for add to cart functionality
    function add() {

        // get id post by name="produk_id" and store in var

        // Undefined method 'getPost'.intelephense(1013)

        // solved undefined method 'getPost' -> https://stackoverflow.com/questions/66152027/codeigniter-undefined-method-getget-intelephense1013

        $produk_id = $this->request->getPost('produk_id');
        $kuantiti = $this->request->getPost('kuantiti');
        
        //dd($_POST); --> check value array received
        //dd($_POST);
        // die and debug output of data through post method
        // dd( $_POST);

        // find produk id in database by refer to var
        $produk = $this->produk_model->find( $produk_id );


        // if produk found, add to cart 
        if ($produk) {
            $this->add_cart( $produk['id'], $produk['nama'], $produk['harga'], $kuantiti );
            $_SESSION['success'] = true;
            $this->session->markAsFlashData('success');
            
        }
        return redirect()->back();
    }


    // method update latest barang simultanouesly
    function update() {
        //dd($_POST); -> got the array data key and value string 

        // set session to null 
        $_SESSION['cart'] = [
            'barang' => []
        ];
        //dd($_SESSION);

        // Incoming Request Class/ Retrieving Input
        // get the id and value kuantiti
        $kuantiti = $this->request->getPost('kuantiti');
        //dd($kuantiti); -> array null
        //var_dump($_POST);
        //die();
        

        // declare variable array 
        $all_ids = [];

        // Check if $myList is indeed an array or an object.
        if (is_iterable($kuantiti)) {
        // If yes, then foreach() will iterate over it.

            // just want produk id only
            foreach($kuantiti as $id => $val) {
            $all_ids[] = $id;
              
        }
        }

        // If $kuantiti was not an array, then this block is executed.
        else {
        echo "Unfortunately, an error occurred.";
        }

    
        // get array value with all id 
        // update all item in once only 
        $produks = $this->produk->model->find( $all_ids );

        foreach( $produks as $produk) {
            $this->add_cart( $produk['id'], $produk['nama'], $produk['harga'], $kuantiti[ $produk['id']] );
        }

        $_SESSION['success'] = true;
        $this->session->markAsFlashData('success');
        return redirect()->back();

    }

    // protected function will prevent it from being served by a URL request.
    // methods hidden from public access
    protected function add_cart( $id, $nama, $harga, $kuantiti ) {
        // check if session is null ?
        if(!isset($_SESSION['cart']['barang'])) {
            // set session to null 
            $_SESSION['cart'] = [
                'barang' => []
            ];
        }

        // check if barang already add to card,
        // so a just add kuantiti barang only
        $found = false;
        foreach ($_SESSION['cart']['barang'] as $index => $barang) {
            if( $barang['id'] == $id ) {
                $_SESSION['cart']['barang'][$index]['kuantiti'] += $kuantiti;
                $found =  true;
            }
        }

        // if no barang add to cart then, 
        // append barang to cart page in session 
        if(!$found) {
            $_SESSION['cart']['barang'][] = [
                'id' => $id,
                'nama' => $nama,
                'harga' => $harga,
                'kuantiti' => $kuantiti
            ];
        }

        return true;
    }
}
