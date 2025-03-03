<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            [
                'nama_unit' => 'Sekretariat Utama',
                'alamat_unit' => 'Gedung BPKP Pusat',
                'telp_unit' => '(021) 85910031',
                'email_unit' => 'sekretariat.sesma@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Deputi Bidang Pengawasan Instansi Pemerintah Bidang Perekonomian dan Kemaritiman',
                'alamat_unit' => 'Gedung BPKP Pusat',
                'telp_unit' => '(021) 85910031',
                'email_unit' => 'deputi1@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Deputi Bidang Pengawasan Instansi Pemerintah Bidang Politik, Hukum, Keamanan, Pembangunan Manusia, dan Kebudayaan',
                'alamat_unit' => 'Gedung BPKP Pusat',
                'telp_unit' => '(021) 85910031',
                'email_unit' => 'deputi2@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Deputi Bidang Pengawasan Penyelenggaraan Keuangan Daerah',
                'alamat_unit' => 'Gedung BPKP Pusat Lantai 10',
                'telp_unit' => '(021) 85910031',
                'email_unit' => 'deputippkd@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Deputi Bidang Akuntan Negara',
                'alamat_unit' => 'Gedung BPKP Pusat Lantai 8',
                'telp_unit' => '(021) 8584867',
                'email_unit' => 'dan@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Deputi Bidang Investigasi',
                'alamat_unit' => 'Gedung BPKP Pusat',
                'telp_unit' => '(021) 8584979',
                'email_unit' => 'investigasi@bpkp.go.id'
            ],
            [
                'nama_unit' => 'Inspektorat',
                'alamat_unit' => 'Gedung BPKP Pusat',
                'telp_unit' => '(021) 85910031',
                'email_unit' => 'inspektorat@bpkp.go.id'
            ],
        ]);
    }
}
