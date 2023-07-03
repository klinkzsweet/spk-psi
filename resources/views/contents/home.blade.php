@extends('layouts.main')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Dashboard</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <div class="row">
    <!-- Column -->
    {{-- <div class="col-md-12 col-lg-12">
      <div class="card card-hover">
        <div class="box bg-cyan text-center">
          <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
          <h6 class="text-white">Dashboard</h6>
        </div>
      </div>
    </div> --}}
    <div class="col-md-12 col-lg-6">
      <div class="card card-hover">
        <div class="box bg-info text-center">
          <div class="d-flex align-items-center justify-content-center p-3">
            <h1 class="font-light text-white"><i class="mdi mdi-target"></i></h1>
            <div class="ml-5">
              <h6 class="text-white">Alternatif</h6>
              <h4 class="text-white">{{ $alternativeCount }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
    <div class="col-md-12 col-lg-6">
      <div class="card card-hover">
        <div class="box bg-success text-center">
          <div class="d-flex align-items-center justify-content-center p-3">
            <h1 class="font-light text-white"><i class="mdi mdi-format-list-bulleted"></i></h1>
            <div class="ml-5">
              <h6 class="text-white">Kriteria</h6>
              <h4 class="text-white">{{ $criteriaCount }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive mt-3">
            <table id="keterangan_c1" class="table table-striped table-bordered">
              <thead class="text-center">
                <tr>
                  <th colspan="2">Keteranganx`</th>
                </tr>
                <tr>
                  <td>Kriteria</td>
                  <td>Nama Kriteria</td>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>C1</td>
                  <td>Support Linux</td>
                </tr>
                <tr>
                  <td>C2</td>
                  <td>Harga</td>
                </tr>
                <tr>
                  <td>C3</td>
                  <td>Memory Requirement</td>
                </tr>
                <tr>
                  <td>C4</td>
                  <td>Resource CPU Requirement</td>
                </tr>
                <tr>
                  <td>C5</td>
                  <td>Support Windows</td>
                </tr>
                <tr>
                  <td>C6</td>
                  <td>Open Source</td>
                </tr>
                <tr>
                  <td>C7</td>
                  <td>Plugin Support</td>
                </tr>
                <tr>
                  <td>C8</td>
                  <td>IPV6 Support</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive mt-3">
            <table id="keterangan_c2" class="table table-striped table-bordered">
              <thead class="text-center">
                <tr>
                  <th colspan="2">Data Kriteria Control Panel</th>
                </tr>
                <tr>
                  <td>Kode</td>
                  <td>Kriteria</td>
                  <td>Satuan</td>
                  <td>Keterangan</td>
                </tr>
              </thead>
              <tbody class="text-center">                <tr>
                  <td>C1</td>
                  <td>Support Linux</td>
                  <td>Yes/No</td>
                  <td>Benefit</td>
                </tr>
                <tr>
                  <td>C2</td>
                  <td>Harga</td>
                  <td>$</td>
                  <td>Cost</td>
                </tr>
                <tr>
                  <td>C3</td>
                  <td>Memory Requirement</td>
                  <td>Mb</td>
                  <td>Cost</td>
                </tr>
                <tr>
                  <td>C4</td>
                  <td>Resource CPU Requirement</td>
                  <td>MHz</td>
                  <td>Cost</td>
                </tr>
                <tr>
                  <td>C5</td>
                  <td>Support Windows</td>
                  <td>Yes/No</td>
                  <td>Benefit</td>
                </tr>
                <tr>
                  <td>C6</td>
                  <td>Open Source</td>
                  <td>Yes/No</td>
                  <td>Benefit</td>
                </tr>
                <tr>
                  <td>C7</td>
                  <td>Plugin Support</td>
                  <td>Yes/No</td>
                  <td>Benefit</td>
                </tr>
                <tr>
                  <td>C8</td>
                  <td>IPV6 Support</td>
                  <td>Yes/No</td>
                  <td>Benefit</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>


  <!-- ============================================================== -->
  <!-- End PAge Content -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Right sidebar -->
  <!-- ============================================================== -->
  <!-- .right-sidebar -->
  <!-- ============================================================== -->
  <!-- End Right sidebar -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection

@section('script')
<script>
  $('#keterangan_c1').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#keterangan_c2').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#keterangan_c3').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#keterangan_c4').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#keterangan_c5').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#keterangan_c6').DataTable({
    'ordering': false,
    'paging': false
  });
</script>
@endsection