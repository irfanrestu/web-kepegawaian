<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->insert([
            ['nama_jurusan' => 'Sekolah Dasar'],
            ['nama_jurusan' => 'Paket A'],
            ['nama_jurusan' => 'Madrasah Ibtidaiyah'],            
            ['nama_jurusan' => 'Sekolah Menengah Pertama'],
            ['nama_jurusan' => 'Paket A'],
            ['nama_jurusan' => 'Madrasah Tsanawiyah'],            
            ['nama_jurusan' => 'MIPA'],
            ['nama_jurusan' => 'IPS'],            
            ['nama_jurusan' => 'Teknik Informatika'],
            ['nama_jurusan' => 'Sistem Informasi'],
            ['nama_jurusan' => 'Manajemen'],
            ['nama_jurusan' => 'Akuntansi'],
            ['nama_jurusan' => 'Hukum'],
            ['nama_jurusan' => 'Psikologi'],
            ['nama_jurusan' => 'Ekonomi'],
            ['nama_jurusan' => 'Biologi'],
        ]);
    }
}
