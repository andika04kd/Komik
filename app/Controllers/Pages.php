<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
          'title' => 'Home | CodeIgniter4',
        ];
        return view('pages/home', $data);
    }

    public function about() 
    {
        $data = [
          'title' => 'About | CodeIgniter4',
        ];
        return view('pages/about', $data);
    }
    public function contact() 
    {
        $data = [
          'title' => 'Contact | CodeIgniter4',
          'alamat' => [
            [
              'tipe' => 'Rumah',
              'alamat' => 'Jl. Cempaka No. 10',
              'kota' => 'Bandung'
            ],
            [
              'tipe' => 'Kantor',
              'alamat' => 'Jl. Cempaka No. 20',
              'kota' => 'Bandung'
            ]
          ]
        ];
        return view('pages/contact', $data);
    }
}
