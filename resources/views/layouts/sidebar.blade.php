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
                    <a href="{{ route('riwayat_jabatan.index') }}">
                        <i class="bi bi-circle"></i><span>Riwayat Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Riwayat Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Dokumen Pendukung</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Data Pegawai Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Profil</span>
            </a>
        </li>
        <!-- End Profil Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">
                <i class="bi bi-journal-text"></i><span>Post Artikel</span>
            </a>
    </ul>
    </li>
    <!-- End Post Artikel Nav -->

    </ul>

</aside>
<!-- End Sidebar-->