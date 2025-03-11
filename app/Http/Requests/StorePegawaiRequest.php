<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'gelar_depan' => 'nullable|string|max:255',
            'gelar_belakang' => 'nullable|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawai,nip',
            'npwp' => 'nullable|string|max:255',
            'no_karpeg' => 'nullable|string|max:255',
            'no_bpjs' => 'nullable|string|max:255',
            'no_kartu_keluarga' => 'nullable|string|max:255',
            'no_nik' => 'required|string|max:255|unique:pegawai,no_nik',
            'id_status_pegawai' => 'required|integer|exists:status_pegawai,status_pegawai_id',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'id_agama' => 'required|integer|exists:agama,agama_id',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pegawai,email',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'homebase' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'file_foto.image' => 'File harus berupa gambar.',
            'file_foto.mimes' => 'Format file yang diperbolehkan: jpeg, png, jpg, gif.',
            'file_foto.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'no_nik.required' => 'NIK wajib diisi.',
            'no_nik.unique' => 'NIK sudah digunakan.',
            'id_status_pegawai.required' => 'Status pegawai wajib dipilih.',
            'id_status_pegawai.exists' => 'Status pegawai tidak valid.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'id_agama.required' => 'Agama wajib dipilih.',
            'id_agama.exists' => 'Agama tidak valid.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi.',
            'rt.required' => 'RT wajib diisi.',
            'rw.required' => 'RW wajib diisi.',
            'kelurahan.required' => 'Kelurahan wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kota_kabupaten.required' => 'Kabupaten/Kota wajib diisi.',
            'kode_pos.required' => 'Kode pos wajib diisi.',
            'homebase.required' => 'Homebase wajib diisi.',
        ];
    }
}
