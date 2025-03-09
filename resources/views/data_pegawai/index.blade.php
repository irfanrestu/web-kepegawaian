@extends('layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Pegawai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    
            <div class="card-body">
              
              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab" aria-controls="biodata" aria-selected="true">Biodata</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="riwayatpendidikan-tab" data-bs-toggle="tab" data-bs-target="#riwayatpendidikan" type="button" role="tab" aria-controls="riwayatpendidikan" aria-selected="false" tabindex="-1">Riwayat Pendidikan</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Contact</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                
                @include('data_pegawai.biodata.index')
                
                </div>
                <div class="tab-pane fade" id="riwayatpendidikan" role="tabpanel" aria-labelledby="riwayatpendidikan-tab">
                <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="container-fluid px-4">
                            
                            <div class="row">
                                <div class="card mb-4">
                                    <div class="card-header">

                                        <a href=""
                                            class="btn btn-sm btn-primary">Tambah Data
                                        </a>

                                        <i class="fas fa-table me-1"></i>
                                        DataTable Example
                                    </div>
                                    <div class="card-body m-2">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggak Lahir</th>
                                                    <th>Email</th>
                                                    <th>No Telepon</th>
                                                    <th>Alamat</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                </div>
              </div>
              <!-- End Default Tabs -->

            </div>
          </div>
      
    </section>
</main>
  @endsection