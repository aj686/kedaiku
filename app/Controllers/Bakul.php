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

    public function index() {

        // $_SESSION['cart'] = [
        //     'barang' => [
        //         [
        //             'id' => 1,
        //             'nama' => 'Lastik',
        //             'harga' => '10.00',
        //             'kuantiti' => 2
        //         ],
    
        //         [
        //             'id' => 2,
        //             'nama' => 'Plastik',
        //             'harga' => '50.00',
        //             'kuantiti' => 5
        //         ],
                
        //         [
        //             'id' => 3,
        //             'nama' => 'Jam',
        //             'harga' => '29.00',
        //             'kuantiti' => 10
        //         ],

        //         [
        //             'id' => 4,
        //             'nama' => 'Baju',
        //             'harga' => '100.00',
        //             'kuantiti' => 1
        //         ]
        //     ]
        // ];

        
         return view('bakul');
    }

    // create method for add to cart 
    function add() {

        // get id post by name="produk_id" and store in var

        // Undefined method 'getPost'.intelephense(1013)

        // solved undefined method 'getPost' -> https://stackoverflow.com/questions/66152027/codeigniter-undefined-method-getget-intelephense1013

        $produk_id = $this->request->getPost('produk_id');
        $kuantiti = $this->request->getPost('kuantiti');

        //dd($_POST); --> check value array received

        // die and debug output of data through post method
        // dd( $_POST);

        // find produk id in database by refer to var
        $produk = $this->produk_model->find( $produk_id );


        // produk not found 
        if ($produk) {
            $this->add_cart( $produk['id'], $produk['nama'], $produk['harga'], $kuantiti );
            $_SESSION['success'] = true;
            $this->session->markAsFlashData('success');
        }
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
