<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation Bar -->
    <div class="bg-white shadow p-4 flex justify-between items-center">
        <div class="flex items-center">
            <button class="text-gray-500 text-2xl mr-4">
                <i class="fas fa-bars"></i>
            </button>
            <div>
                <h1 class="text-xl font-bold">SISTEM</h1>
                <p class="text-sm text-gray-600">Dashboard Admin</p>
            </div>
        </div>
        <div class="flex items-center">
            <img alt="Profile picture of Tiara Andini" class="rounded-full mr-3" height="40" src="https://placehold.co/40x40" width="40"/>
            <div>
                <p class="font-bold">TIARA ANDINI</p>
                <p class="text-sm text-gray-600">Biro SDM</p>
            </div>
        </div>
    </div>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 p-6">
            <nav>
                <ul>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-home mr-3"></i>
                            Home
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-info-circle mr-3"></i>
                            Informasi
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-users mr-3"></i>
                            Kepegawaian
                        </a>
                        <ul class="ml-6 mt-2">
                            <li class="mb-2">
                                <a class="flex items-center text-white bg-blue-500 p-2 rounded" href="#">
                                    <i class="fas fa-user mr-3"></i>
                                    Biodata
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                                    <i class="fas fa-briefcase mr-3"></i>
                                    Riwayat Jabatan
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                                    <i class="fas fa-graduation-cap mr-3"></i>
                                    Riwayat Pendidikan
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                                    <i class="fas fa-file-alt mr-3"></i>
                                    Dokumen
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-user-circle mr-3"></i>
                            User
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-sticky-note mr-3"></i>
                            Post
                        </a>
                    </li>
                    <li class="mt-6">
                        <a class="flex items-center text-gray-700 hover:text-blue-500" href="#">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-bold">Kepegawaian &gt; Biodata &gt; Tambah Biodata</h2>
                </div>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <form>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">NAMA LENGKAP *</label>
                            <input class="w-full p-2 border rounded" placeholder="NAMA LENGKAP *" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">JENIS KELAMIN</label>
                            <select class="w-full p-2 border rounded">
                                <option>JENIS KELAMIN</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">GELAR DEPAN</label>
                            <input class="w-full p-2 border rounded" placeholder="GELAR DEPAN" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">TEMPAT LAHIR</label>
                            <select class="w-full p-2 border rounded">
                                <option>TEMPAT LAHIR</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">GELAR BELAKANG</label>
                            <input class="w-full p-2 border rounded" placeholder="GELAR BELAKANG" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">TANGGAL LAHIR</label>
                            <input class="w-full p-2 border rounded" placeholder="DD/MM/YY" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">NIP *</label>
                            <input class="w-full p-2 border rounded" placeholder="NIP *" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">AGAMA</label>
                            <select class="w-full p-2 border rounded">
                                <option>AGAMA</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">NPWP</label>
                            <input class="w-full p-2 border rounded" placeholder="NPWP" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">ALAMAT LENGKAP</label>
                            <input class="w-full p-2 border rounded" placeholder="ALAMAT LENGKAP" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">NO. KARPEG</label>
                            <input class="w-full p-2 border rounded" placeholder="NO. KARPEG" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">RT</label>
                            <input class="w-full p-2 border rounded" placeholder="RT" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">NO. BPJS</label>
                            <input class="w-full p-2 border rounded" placeholder="NO. BPJS" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">RW</label>
                            <input class="w-full p-2 border rounded" placeholder="RW" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">NO. KK</label>
                            <input class="w-full p-2 border rounded" placeholder="NO. KK" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">PROVINSI</label>
                            <select class="w-full p-2 border rounded">
                                <option>PROVINSI</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">NO. NIK</label>
                            <input class="w-full p-2 border rounded" placeholder="NO. NIK" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">KOTA/ KABUPATEN</label>
                            <select class="w-full p-2 border rounded">
                                <option>KOTA/ KABUPATEN</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">STATUS PEGAWAI *</label>
                            <select class="w-full p-2 border rounded">
                                <option>STATUS PEGAWAI *</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">KECAMATAN</label>
                            <input class="w-full p-2 border rounded" placeholder="KECAMATAN" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">EMAIL</label>
                            <input class="w-full p-2 border rounded" placeholder="EMAIL" type="email"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">DESA/ KELURAHAN</label>
                            <select class="w-full p-2 border rounded">
                                <option>DESA/ KELURAHAN</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">NO. TELEPON</label>
                            <input class="w-full p-2 border rounded" placeholder="NO. TELEPON" type="text"/>
                        </div>
                        <div>
                            <label class="block text-gray-700">KODE POS</label>
                            <input class="w-full p-2 border rounded" placeholder="KODE POS" type="text"/>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="bg-yellow-500 text-white px-6 py-2 rounded" type="submit">TAMBAH</button>
                    </div>
                </form>
            </div>
            <footer class="mt-6 text-center text-gray-600">
                ©2025 - Tim IT BPKP
            </footer>
        </div>
    </div>
</body>
</html>