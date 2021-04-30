<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {

        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        // $komikModel = new \App\Models\KomikModel();

        // $komikModel = new KomikModel();



        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)

        ];


        if (empty($data['komik'])) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug .  ' tidak ditemukan');
        }
        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();

        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }

    public function save()

    {
        $request = service('request');

        $request->getVar();

        if (!$this->validate([

            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' =>  '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',

                ]
            ]


        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        //ambil gambar
        $fileSampul = $request->getFile('sampul');


        //apakah gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {

            //generate nama sampul
            $namaSampul = $fileSampul->getRandomName();


            //pindah ke publik -> img
            $fileSampul->move('img', $namaSampul);
        }




        $slug = url_title($request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $request->getVar('judul'), 'slug' => $slug,
            'penulis' => $request->getVar('penulis'),
            'penerbit' => $request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan. ');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        //cari gambar berdasar ID
        $komik = $this->komikModel->find($id);

        //jangan hapus gambar default.png
        if ($komik['sampul'] != 'default.png') {

            //Hapus Gambar
            unlink('img/' . $komik['sampul']);
        }




        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus. ');
        return redirect()->to('/komik');
    }



    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }

    public function update($id)
    {
        $request = service('request');
        $request->getVar();


        //cek judul
        $komikLama = $this->komikModel->getKomik($request->getVar('slug'));
        if ($komikLama['judul'] == $request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([

            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' =>  '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',

                ]
            ]


        ])) {

            return redirect()->to('/komik/edit' . $request->getVar('slug'))->withInput();
        }

        $fileSampul = $request->getFile('sampul');

        if ($fileSampul->getError() == 4) {

            $namaSampul = $request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);

            unlink('img/' . $request->getVar('sampulLama'));
        }

        $slug = url_title($request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $request->getVar('judul'), 'slug' => $slug,
            'penulis' => $request->getVar('penulis'),
            'penerbit' => $request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah ');

        return redirect()->to('/komik');
    }
}