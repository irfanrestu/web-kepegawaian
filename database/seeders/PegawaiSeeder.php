<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pegawai')->insert([
            [
                'nama' => 'nama1',
                'jenis_kelamin' => 'Pria',
                'tempat_lahir' => "jakarta",
                'tanggal_lahir' => '18-juli-1999',
                'email' => 'test@gmail.com',
                'no_tlp' => '0988882123',
                'alamat' => 'dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'nama2',
                'jenis_kelamin' => 'Wanita',
                'tempat_lahir' => "Depok",
                'tanggal_lahir' => '17-agustus-1999',
                'email' => 'test1@gmail.com',
                'no_tlp' => '09882882123',
                'alamat' => 'dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'nama3',
                'jenis_kelamin' => 'Pria',
                'tempat_lahir' => "Madiun",
                'tanggal_lahir' => '12-juli-1999',
                'email' => 'test3@gmail.com',
                'no_tlp' => '098821882123',
                'alamat' => 'dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
