<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\StatusPegawais;
use App\Models\Agama;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $pegawai = Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $pegawai = Pegawai::all();
        }

        return view('pegawai.biodata.index', compact('pegawai'));
    }

    public function create()
    {
        // Fetch data from the database
        $listagama = Agama::all();
        $liststatuspegawai = StatusPegawais::all();

        return view('pegawai.biodata.create', compact('listagama', 'liststatuspegawai'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'gelar_depan' => 'nullable|string|max:255',
            'gelar_belakang' => 'nullable|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawais,nip',
            'npwp' => 'nullable|string|max:255',
            'no_karpeg' => 'nullable|string|max:255',
            'no_bpjs' => 'nullable|string|max:255',
            'no_kartu_keluarga' => 'nullable|string|max:255',
            'no_nik' => 'required|string|max:255|unique:pegawais,no_nik',
            'id_status_pegawai' => 'required|integer|exists:status_pegawais,status_pegawai_id',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'id_agama' => 'required|integer|exists:agamas,agama_id',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pegawais,email',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'homebase' => 'required|string|max:255',
        ], [
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
        ]);

        // Handle file upload
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        } else {
            $filePath = null;
        }

        // Create a new Pegawai record
        Pegawai::create([
            'file_foto' => $filePath,
            'nama_lengkap' => $request->nama_lengkap,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'nip' => $request->nip,
            'npwp' => $request->npwp,
            'no_karpeg' => $request->no_karpeg,
            'no_bpjs' => $request->no_bpjs,
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'no_nik' => $request->no_nik,
            'id_status_pegawai' => $request->id_status_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_agama' => $request->id_agama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_lengkap' => $request->alamat_lengkap,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kode_pos' => $request->kode_pos,
            'homebase' => $request->homebase,
        ]);

        return redirect()->route('data_pegawai.index')->with('success', 'Data Pegawai Berhasil Dibuat');
    }

    public function edit(Pegawai $pegawai)
    {
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();

        return view('pegawai.biodata.edit', compact('pegawai', 'liststatuspegawai', 'listagama'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $user = $pegawai->user;
        // Validate the request data
        $request->validate([
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'gelar_depan' => 'nullable|string|max:255',
            'gelar_belakang' => 'nullable|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawais,nip,' . $pegawai->pegawai_id . ',pegawai_id',
            'npwp' => 'nullable|string|max:255',
            'no_karpeg' => 'nullable|string|max:255',
            'no_bpjs' => 'nullable|string|max:255',
            'no_kartu_keluarga' => 'nullable|string|max:255',
            'no_nik' => 'required|string|max:255|unique:pegawais,no_nik,' . $pegawai->pegawai_id . ',pegawai_id',
            'id_status_pegawai' => 'required|integer|exists:status_pegawais,status_pegawai_id',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'id_agama' => 'required|integer|exists:agamas,agama_id',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pegawais,email,' . $pegawai->pegawai_id . ',pegawai_id',
            'email' => 'required|email|max:255|unique:users,email,'. $user->id . ',id',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'homebase' => 'required|string|max:255',
            'remove_photo' => 'nullable|boolean',
        ], [
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
        ]);

        // Add email validation only if the email is being changed
        if ($request->email !== $user->email) {
            $rules['email'] = 'required|email|max:255|unique:users,email,' . $user->id;
        }

        // Handle profile photo update
        if ($request->hasFile('file_foto')) {
            if ($pegawai->file_foto && Storage::exists($pegawai->file_foto)) {
                Storage::delete($pegawai->file_foto);
            }
            $path = $request->file('file_foto')->store('profile_photos', 'public');
            $pegawai->file_foto = $path;
        } elseif ($request->input('remove_photo') == '1') {
            if ($pegawai->file_foto && Storage::exists($pegawai->file_foto)) {
                Storage::delete($pegawai->file_foto);
            }
            $pegawai->file_foto = null;
        }

        // Update the employee's data
        $pegawai->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'gelar_depan' => $request->input('gelar_depan'),
            'gelar_belakang' => $request->input('gelar_belakang'),
            'nip' => $request->input('nip'),
            'npwp' => $request->input('npwp'),
            'no_karpeg' => $request->input('no_karpeg'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kartu_keluarga' => $request->input('no_kartu_keluarga'),
            'no_nik' => $request->input('no_nik'),
            'id_status_pegawai' => $request->input('id_status_pegawai'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'id_agama' => $request->input('id_agama'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kota_kabupaten' => $request->input('kota_kabupaten'),
            'kode_pos' => $request->input('kode_pos'),
            'homebase' => $request->input('homebase'),
        ]);

        $user->update([
            'name' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
        ]);

        return back()->with('success', 'Data Pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('data_pegawai.index')->with('success', 'Data berhasil di hapus');
    }

    public function profile(Pegawai $pegawai)
    {
        $rolelist = Role::all();
        $userlist = User::all();
        $liststatuspegawai = StatusPegawais::all();
        $listagama = Agama::all();
        return view('pegawai.biodata.profile', compact('pegawai', 'rolelist','userlist','liststatuspegawai','listagama'));
    }

    public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password sekarang salah.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }

    public function changeRole(Request $request, $pegawai)
    {
        // Validate the request
        $request->validate([
            'role_id' => 'required|exists:roles,role_id',
        ]);

        // Find the pegawai
        $user = User::where('id_pegawai', $pegawai)->firstorFail();

        // Update the role
        $user->update([
            'id_role' => $request->role_id,
        ]);

        return back()->with('success', 'Role berhasil diubah.');
    }

  
}