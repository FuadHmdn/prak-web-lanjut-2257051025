<?php

namespace Database\Seeders;

use App\Models\JurusanModels;
use Illuminate\Database\Seeder;

class jurusan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jurusan' => 'Ilmu Komputer', 'fakultas_id' => 1],
            ['jurusan' => 'Sistem Informasi', 'fakultas_id' => 1],
            ['jurusan' => 'Mesin', 'fakultas_id' => 2],
            ['jurusan' => 'Informatika', 'fakultas_id' => 2],
        ];
    
        foreach ($data as $jurusan) {
            JurusanModels::create([
                'nama_jurusan' => $jurusan['jurusan'],
                'fakultas_id' => $jurusan['fakultas_id'],
            ]);
        }
    }
}
