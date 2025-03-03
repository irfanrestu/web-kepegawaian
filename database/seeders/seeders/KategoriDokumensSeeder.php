<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDokumensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_dokumens')->insert([
            ['kategori_dokumen' => 'AKTA KELAHIRAN'],
            ['kategori_dokumen' => 'KTP'],
            ['kategori_dokumen' => 'KK'],
            ['kategori_dokumen' => 'KARPEG'],
            ['kategori_dokumen' => 'BPJS'],
            ['kategori_dokumen' => 'TASPEN'],
            ['kategori_dokumen' => 'KARIS/KARSU'],
            ['kategori_dokumen' => 'NPWP'],
            ['kategori_dokumen' => 'SUMPAH PNS'],
            ['kategori_dokumen' => 'KEPUTUSAN NIP BKN'],
            ['kategori_dokumen' => 'SPMT CPNS'],
        ]);
    }
}
