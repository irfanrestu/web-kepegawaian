<?php

namespace App\Observers;

use App\Models\Pegawai;
use App\Models\Role;
use App\Models\User;

class PegawaiObserver
{
    /**
     * Handle the Pegawai "created" event.
     */
    public function created(Pegawai $pegawai)
    {
        //mencari role "pegawai
        $role = Role::where('nama_role','pegawai')->first();

            if ($role) {
                //membuat user baru
                $user = new User();
                $user->name = $pegawai->nama_lengkap;
                $user->email = $pegawai->email;
                $user->password = bcrypt('rahasia');
                $user->id_role = $role->role_id;
                $user->id_pegawai = $pegawai->pegawai_id;
                $user->save();
            }else {
                
                throw new \Exception('Role "pegawai" not found.');
            }
    }

    /**
     * Handle the Pegawai "updated" event.
     */
    public function updated(Pegawai $pegawai): void
    {
        //
    }

    /**
     * Handle the Pegawai "deleted" event.
     */
    public function deleted(Pegawai $pegawai): void
    {
        //
    }

    /**
     * Handle the Pegawai "restored" event.
     */
    public function restored(Pegawai $pegawai): void
    {
        //
    }

    /**
     * Handle the Pegawai "force deleted" event.
     */
    public function forceDeleted(Pegawai $pegawai): void
    {
        //
    }
}
