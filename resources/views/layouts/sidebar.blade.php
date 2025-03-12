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