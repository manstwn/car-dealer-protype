<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Home Page'
        ];
        echo view('Pages/home', $data);

    }
    public function about()
    { 
        $data = [
            'title' => 'About'
        ];
        echo view('Pages/About', $data);
    }

    public function contact()
    { 
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jalan Bosih',
                    'kota' => 'Bekasi'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jalan Kota',
                    'kota' => 'Jakarta'
                ]
            ]
        ];
        echo view('Pages/contact', $data);
    }


}