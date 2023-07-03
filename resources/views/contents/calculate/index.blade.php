@extends('layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Perhitungan</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/matrices">Matriks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perhitungan</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Matriks Keputusan</h5>
          <div class="table-responsive mt-3">
            <table id="matriks_keputusan" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                @php
                $keys = array_keys($matrix)
                @endphp

                @foreach ($keys as $key)
                <tr>
                  <td>A{{ $loop->iteration }}</td>
                  @foreach ($matrix[$key] as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>
                @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Normalisasi Matriks</h5>
          <div class="table-responsive mt-3">
            <table id="normalisasi" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                @php
                $keys = array_keys($normalisasi)
                @endphp

                @foreach ($keys as $key)
                <tr>
                  <td>A{{ $loop->iteration }}</td>
                  @foreach ($normalisasi[$key] as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>
                @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Jumlah</h5>
          <div class="table-responsive mt-3">
            <table id="sum_normalisasi" class="table table-striped table-bordered">
              <thead>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                <tr>
                  @foreach ($sumEachCriteria as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>

              </tbody>
              <tfoot>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Penentuan Nilai Rata-rata Kinerja yang dinormalisasi</h5>
          <div class="table-responsive mt-3">
            <table id="average_value" class="table table-striped table-bordered">
              <thead>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                <tr>
                  @foreach ($averageValue as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>

              </tbody>
              <tfoot>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Penentuan Nilai Variasi Preferensi</h5>
          <div class="table-responsive mt-3">
            <table id="pow" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                @php
                $keys = array_keys($pow)
                @endphp

                @foreach ($keys as $key)
                <tr>
                  <td>A{{ $loop->iteration }}</td>
                  @foreach ($pow[$key] as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>
                @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Jumlah</h5>
          <div class="table-responsive mt-3">
            <table id="sum_pow" class="table table-striped table-bordered">
              <thead>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                <tr>
                  @foreach ($sumPow as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>

              </tbody>
              <tfoot>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Penentuan Deviasi Nilai Preferensi</h5>
          <div class="table-responsive mt-3">
            <table id="result" class="table table-striped table-bordered">
              <thead>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                    <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  @foreach ($result as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                  <td>{{ round($sumResult, 4) }}</td>
                </tr>

              </tbody>
              <tfoot>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                    <th>Jumlah</th>
                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Penentuan Bobot Kriteria</h5>
          <div class="table-responsive mt-3">
            <table id="bobot_kriteria" class="table table-striped table-bordered">
              <thead>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                <tr>
                  @foreach ($criteriaWeight as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>

              </tbody>
              <tfoot>
                <tr>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="card-body">
          <h5 class="card-title mb-3">Penentuan Nilai PSI</h5>
          <div class="table-responsive mt-3">
            <table id="psi" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </thead>
              <tbody>

                @php
                $keys = array_keys($psi)
                @endphp

                @foreach ($keys as $key)
                <tr>
                  <td>A{{ $loop->iteration }}</td>
                  @foreach ($psi[$key] as $value)
                  <td>{{ round($value, 4) }}</td>
                  @endforeach
                </tr>
                @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>Alternatif</th>

                  @for ($i = 0; $i < count($criterias); $i++) <th>C{{ $i + 1 }}</th>

                    @endfor

                </tr>
              </tfoot>
            </table>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card-body">
              <h5 class="card-title mb-3">Nilai PSI</h5>
              <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>Alternatif</td>
                      <td>θ</td>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                    $keys = array_keys($sumPsi)
                    @endphp

                    @foreach ($keys as $key)
                    <tr>
                      <td>A{{ $key }}</td>
                      <td>{{ round($sumPsi[$key], 4) }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <td>Alternatif</td>
                      <td>θ</td>
                    </tr>
                  </tfoot>
                </table>
              </div>

            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card-body">
              <h5 class="card-title mb-3">Perankingan</h5>
              <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>Alternatif</td>
                      <td>θ</td>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                    $keys = array_keys($sumPsiRank)
                    @endphp

                    @foreach ($keys as $key)
                    <tr>
                      <td id="key">A{{ $key }}</td>
                      <td id="rank">{{ round($sumPsiRank[$key], 4) }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <td>Alternatif</td>
                      <td>θ</td>
                    </tr>
                  </tfoot>
                </table>
              </div>

            </div>
          </div>
        </div>

        <div class="card-body">
          <h5 class="card-title mb-3">Perankingan</h5>
          <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <td>Alternatif</td>
                  <td>Nama Alternatif</td>
                  <td>Value</td>
                </tr>
              </thead>
              <tbody id="table-body">
              </tbody>
              <tfoot>
                <tr>
                  <td>Alternatif</td>
                  <td>Nama Alternatif</td>
                  <td>Value</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="card-body">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Kesimpulan :</h4>
            <p>Sekolah yang terpilih menjadi sekolah terbaik berdasarkan beberapa kriteria tertentu adalah
              <b id="firstRank"></b>
            </p>
            <hr>
            <p class="mb-3"><b>Urutan Ranking 1 - 3 :</b></p>
            <p class="m-0" id="first"></p>
            <p class="m-0" id="second"></p>
            <p class="m-0" id="third"></p>

        </div>

        <div class="card-body">
          <a href="/matrices" class="btn btn-danger"><i class="mdi mdi-arrow-left-bold"></i> Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $('#matriks_keputusan').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#normalisasi').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#sum_normalisasi').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#average_value').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#pow').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#sum_pow').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#result').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#bobot_kriteria').DataTable({
    'ordering': false,
    'paging': false
  });
  $('#psi').DataTable({
    'ordering': false,
    'paging': false
  });

  const rank = document.querySelectorAll('#rank')
  const firstRank = document.querySelector('#firstRank')
  const first = document.querySelector('#first')
  const second = document.querySelector('#second')
  const third = document.querySelector('#third')


  let listAlternative = []
  rank.forEach(e => {
    listAlternative.push({
      'code': e.previousElementSibling.innerHTML,
      'value': e.innerHTML
    })
  });

  let dbAlternative = []
  $.get('/matrices/alternatives', function (data) {
    data.alternatives.forEach(e => {
      dbAlternative.push({
        'key': e.id,
        'code': e.code,
        'name': e.name
      })
    });

    listAlternative.forEach(e => {
      dbAlternative.forEach(el => {
        if (e.code == el.code) {
          e.key = el.key
          e.name = el.name
        }
      });
    });


    const tableBody = document.querySelector('#table-body')
    listAlternative.forEach(e => {
      tableBody.innerHTML += `
        <tr>
          <td>A${e.key}</td>
          <td>${e.name}</td>
          <td>${e.value}</td>
        </tr>
      `
    });



    firstRank.innerHTML = listAlternative[0].name
    first.innerHTML = `1. ${listAlternative[0].name} (${listAlternative[0].value})`
    second.innerHTML = `2. ${listAlternative[1].name} (${listAlternative[1].value})`
    third.innerHTML = `3. ${listAlternative[2].name} (${listAlternative[2].value})`

  });
</script>
@endsection