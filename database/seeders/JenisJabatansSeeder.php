<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisJabatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_jabatans')->insert([
            ['jenis_jabatan' => 'Jabatan Struktural'],
            ['jenis_jabatan' => 'Jabatan Fungsional'],
            ['jenis_jabatan' => 'Jabatan Pelaksana'],
            ['jenis_jabatan' => 'PPPK'],
        ]);
    }
}
