<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;


class Orang_Seeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Suka Astawa',
                'alamat'        => 'Penglatan, Jln. Pulau Irian Ds. Penglatan',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()

            ],
            [
                'nama'          => 'Mahmud',
                'alamat'        => 'Penglatan, Jln. 987',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()

            ],
            [
                'nama'          => 'Cangak',
                'alamat'        => 'Penglatan, Jln. 123',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()

            ],
            [
                'nama'          => 'Mujahidin',
                'alamat'        => 'Penglatan, Jln. 554',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()

            ],


        ];

        // Simple Queries
        // $this->db->query("INSERT INTO orang (nama, alamat) VALUES(:nama:, :alamat:)", $data);

        // Using Query Builder
        // $this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}