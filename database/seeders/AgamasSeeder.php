<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agamas')->insert([
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katholik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Khonghucu'],
        ]);
    }
}
