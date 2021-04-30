<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()

    {
        $data = [
            'title' => 'Statistik | Deskriptif'
        ];

        return view('/pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Statistik'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Statistik',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jln, abc No 123 ',
                    'kota' => 'Bali'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jln. Pulau Irian ',
                    'kota' => 'Bandung'

                ]
            ]
        ];
        echo view('pages/contact', $data);
    }
}