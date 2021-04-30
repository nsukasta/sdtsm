<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\HTTP\Request;
use PhpParser\Builder;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Statistik extends BaseController
{

    protected $orangModel;
    public function __construct()
    
    {
        helper('form');

        $this->orangModel = new UserModel();
    }

    public function index()

    {
        $db  = \Config\Database::connect(); {
            $builder = $db->table('user');

            $builder->selectMax('nilai');
            $query  = $builder->get();

            $builder->selectMin('nilai');
            $nMin   = $builder->get();

            $builder->selectAvg('nilai');
            $nAvg   = $builder->get();

            $builder->selectCount('nilai');
            $nTotal = $builder->get();

            $builder->selectSum('nilai');
            $nSum   = $builder->get();

            $nf = $db->query('SELECT nilai, COUNT(*) as count FROM user GROUP BY nilai');

           
        }

        $user = $this->orangModel->findAll();

        $data = [

            'nf'            => $nf,
            // 'nama'          => $name,
            'nSum'          => $nSum,
            'nTotal'        => $nTotal,
            'nAvg'          => $nAvg,
            'nMin'          => $nMin,
            'nMax'          => $query,
            'title'         => 'Statistik Deskriptif | Statistik',
            'users'         => $user,
            'validation'    => \Config\Services::validation()
        ];
        return view('statistik/index', $data);
    }



    public function save()
    {
        // validasi input

        if (!$this->validate([

        'nilai' => [

                'rules'              => 'required|integer|is_natural|less_than[101]|decimal',
                'errors'             => [
                    'required'       => '{field} harus diisi.',
                    'integer'        => '{field} harus desimal',
                    'less_than'      => '{field} maximal 100',
                    'decimal'        => '{field} harus desimal',
                    'is_natural'     => '{field} minimum 0'
                ]
            ]


        ])) {

            $validation = \Config\Services::validation();

            return redirect()->to('/statistik/index')->withInput()->with('validation', $validation);
        }


        $request = service('request');
        $request->getVar();



        $this->orangModel->save([
           
            'nilai' => $request->getVar('nilai')

        ]);

        session()->setFlashdata('pesan', 'Nilai berhasil ditambahkan.');

        return redirect()->to('/statistik');
    }



    public function delete($id)
    {

        $this->orangModel->delete($id);

        session()->setFlashdata('pesan', 'Nilai berhasil dihapus.');

        return redirect()->to('/statistik');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Nilai | Statistik',

            'validation' => \Config\Services::validation(),

            'user' => $this->orangModel->getUser($id)

        ];

        return view('/statistik/edit', $data);
    }

    public function update($id)

    {
        $request = service('request');
        $request->getVar();

        if (!$this->validate([

        
            'nilai' => [

                'rules'              => 'required|integer|is_natural|less_than[101]|decimal',
                'errors'             => [
                    'required'       => '{field} harus diisi.',
                    'integer'        => '{field} harus desimal',
                    'less_than'      => '{field} maximal 100',
                    'decimal'        => '{field} harus desimal',
                    'is_natural'     => '{field} minimum 0'
                ]
            ]

        ])) {

            $validation = \Config\Services::validation();

            return redirect()->to('/statistik/edit/' . $request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->orangModel->save([
            'id' => $id,
            'nilai' => $request->getVar('nilai')

        ]);

        session()->setFlashdata('pesan', 'Nilai berhasil diubah.');

        return redirect()->to('/statistik');
    }
    
    
    public function import()
    {
        $file = $this->request->getFile('file_excel');
        
        $ext = $file->guessExtension();

         if ($ext =='xls' ) {
           $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else 
        
        {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        
        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $x => $excel) {
            if ($x == 0) {
                continue;
            }
            
           $data = [
               'nilai' => $excel['0']
               ];

            $this->orangModel->add($data);
            session()->setFlashdata('msg', 'Data Berhasil di Import!!');
            
            return redirect()->to(base_url('statistik'));
        }
        
    
    }
    


    public function excel()
    {
   

    $data = [
        'nilai' => $this->orangModel->getUser()
    ];

    return view('excel/excel', $data);
    }

    
}