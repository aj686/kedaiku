<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //dalam senarai pelajar($all_pelajar) ada data pelajar
        //nested array with associative array
        //'key' => 'value'

        // $all_pelajar = [
        //     [

        //         //data pertama 
        //         'nama' => 'MUHD AIMAN',
        //         'gambar' => 'https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600',
        //         'tingkatan' => 5,
        //         'kelas' => 'ST'
        //     ],

        //     [   
        //         //data kedua 
        //         'nama' => 'MUHD AQIL',
        //         'gambar' => 'https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600',
        //         'tingkatan' => 5,
        //         'kelas' => 'SF'
        //     ],

        //     [   
        //         //data ketiga 
        //         'nama' => 'MUHD AJWAD',
        //         'gambar' => 'https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600',
        //         'tingkatan' => 5,
        //         'kelas' => 'SP'
        //     ],
        //     [   
        //         //data ketiga 
        //         'nama' => 'MUHD HANIF',
        //         'gambar' => 'https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600',
        //         'tingkatan' => 5,
        //         'kelas' => 'SP'
        //     ]
    
        // ];

        $db = db_connect();  // start connection to database save   --OBJECT METHOD 

        // $result = $db->query('SELECT * FROM gambar'); // query statement for select all data 

        $result = $db->query('SELECT * FROM gambar ORDER BY nama desc'); // select all data by ascending alphabet Z to A

        $all_pelajar = $result->getResult();

        //dd( $all_pelajar );  // debug and die.....not repeat 

        return view('homepage', [ 'all_pelajar' => $all_pelajar ]);
    }

    function hello()
    {
        echo "<h1>Hello......</h1>";
    }

    function welcome() {
        echo "<h1>Welcome......</h1>";
    }
}
