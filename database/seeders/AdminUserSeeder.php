<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $pegawaiId = DB::table('pegawais')->insertGetId([
            'nama_lengkap' => 'Admin Pegawai',
            'nip' => '1234567890',
            'no_nik' => '0987654321', 
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'id_agama' => 1,
            'id_status_pegawai' => 1,
            'no_hp' => '081234567890',
            'email' => 'admin@website.com',
            'alamat_lengkap' => 'Jl. Admin No. 1',
            'rt' => '001',
            'rw' => '002',
            'kelurahan' => 'Admin Kelurahan',
            'kecamatan' => 'Admin Kecamatan',
            'kota_kabupaten' => 'Jakarta',
            'kode_pos' => '12345',
            'homebase' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        DB::table('users')->insert([
            'name' => 'Admin Pegawai',
            'email' => 'admin@website.com',
            'password' => Hash::make('rahasiaadmin'), 
            'id_role' => 1, 
            'id_pegawai' => $pegawaiId,
            'remember_token' => Str::Random(60),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}