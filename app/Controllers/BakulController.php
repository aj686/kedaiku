<?php

// we want to control the data 

namespace App\Controllers;

use CodeIgniter\Router\Exceptions\RedirectException;

class BakulController extends BaseController
{  
    

    public function index() {

        $_SESSION['cart'] = [
            'barang' => [
                [
                    'id' => 1,
                    'nama' => 'Lastik',
                    'harga' => '10.00',
                    'kuantiti' => 2
                ],
    
                [
                    'id' => 2,
                    'nama' => 'Plastik',
                    'harga' => '50.00',
                    'kuantiti' => 5
                ],
                
                [
                    'id' => 3,
                    'nama' => 'Jam',
                    'harga' => '29.00',
                    'kuantiti' => 10
                ],

                [
                    'id' => 4,
                    'nama' => 'Baju',
                    'harga' => '100.00',
                    'kuantiti' => 1
                ]
            ]
        ];

        return view('bakul');
    }
}
