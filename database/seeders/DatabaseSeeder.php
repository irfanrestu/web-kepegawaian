<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AgamasSeeder::class,
            StatusPegawaisSeeder::class,
            KategoriDokumensSeeder::class,
            JenjangPendidikansSeeder::class,
            JurusansSeeder::class,
            RolesSeeder::class,
            JenisJabatansSeeder::class,
            UnitsSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
