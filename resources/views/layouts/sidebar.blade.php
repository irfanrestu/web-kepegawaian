<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('informasi.index') }}">
                <i class="bi bi-journal-text"></i><span>Informasi</span>
            </a>
        </li>
        <!-- Informasi -->

        @if(auth()->check() && (auth()->user()->role->nama_role === 'Admin'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('data_pegawai.index') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data Pegawai</span>
            </a>
        </li>
        <!-- End Data Pegawai Nav Admin -->

        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data Pegawai</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('biodata.index') }}">
                        <i class="bi bi-circle"></i><span>Biodata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayat_kepegawaian.index') }}">
                        <i class="bi bi-circle"></i><span>Riwayat Kepegawaian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayat_pendidikan.index') }}">
                        <i class="bi bi-circle"></i><span>Riwayat Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dokumen_pendukung.index') }}">
                        <i class="bi bi-circle"></i><span>Dokumen Pendukung</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Data Pegawai Nav Pegawai -->
        @endif

        <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.index') }}">
                <i class="bi bi-person"></i>
                <span>Profile Pribadi</span>
            </a>
        </li>
        <!-- End Profil Nav -->

        @if(auth()->check() && (auth()->user()->role->nama_role === 'Admin' || auth()->user()->role->nama_role === 'Pegawai Konten'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <i class="bi bi-journal-text"></i><span>Post Artikel</span>
                </a>
            </li>
        @endif
        <!-- End Post Artikel Nav -->

    </ul>

</aside>
<!-- End Sidebar-->