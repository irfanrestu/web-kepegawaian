<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPegawaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pegawais')->insert([
            ['status_pegawai' => 'CPNS'],
            ['status_pegawai' => 'PNS'],
            ['status_pegawai' => 'PPPK'],
        ]);
    }
}
