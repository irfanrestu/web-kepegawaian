<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangPendidikansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenjang_pendidikans')->insert([
            ['jenjang_pendidikan' => 'SD'],
            ['jenjang_pendidikan' => 'Paket A'],
            ['jenjang_pendidikan' => 'MI'],
            ['jenjang_pendidikan' => 'SMP'],
            ['jenjang_pendidikan' => 'Paket B'],
            ['jenjang_pendidikan' => 'MTs'],
            ['jenjang_pendidikan' => 'SMA'],
            ['jenjang_pendidikan' => 'SMK'],
            ['jenjang_pendidikan' => 'MA'],
            ['jenjang_pendidikan' => 'MAK'],
            ['jenjang_pendidikan' => 'D1'],
            ['jenjang_pendidikan' => 'D2'],
            ['jenjang_pendidikan' => 'D3'],
            ['jenjang_pendidikan' => 'D4'],
            ['jenjang_pendidikan' => 'S1'],
            ['jenjang_pendidikan' => 'S2'],
            ['jenjang_pendidikan' => 'S3'],
        ]);
    }
}
