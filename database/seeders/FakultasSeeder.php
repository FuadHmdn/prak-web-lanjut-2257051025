<?php

namespace Database\Seeders;

use App\Models\fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Fakultas FMIPA',
            'Fakultas TEKNIK',
        ];

        foreach ($data as $fakultas) {
            fakultas::create([
                'fakultas' => $fakultas,
            ]);
        }
    }
}
