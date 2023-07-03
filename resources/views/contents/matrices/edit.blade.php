@extends('layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Edit Nilai Matriks</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/matrices">Matriks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Nilai Matriks</li>
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
        <form action="/matrices/{{ $matrix->id }}" method="POST" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card-body">
            <h4 class="card-title mb-3">Edit Nilai Matriks</h4>
            <div class="form-group row">
              <label class="col-md-3 m-t-15">Alternatif</label>
              <div class="col-md-9">
                <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                  name="alternative_id">
                  <option>Pilih Alternatif</option>

                  @foreach ($alternatives as $alternative)
                  @if (old('alternative_id', $matrix->alternative_id) == $alternative->id)
                  <option value="{{ $alternative->id }}" selected>{{ $alternative->name }}</option>
                  @else
                  <option value="{{ $alternative->id }}">{{ $alternative->name }}</option>
                  @endif
                  @endforeach

                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 m-t-15">Kriteria</label>
              <div class="col-md-9">
                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="criteria_id">
                  <option>Pilih Kriteria</option>

                  @foreach ($criterias as $criteria)
                  @if (old('criteria_id', $matrix->criteria_id) == $criteria->id)
                  <option value="{{ $criteria->id }}" selected>{{ $criteria->name }}</option>
                  @else
                  <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                  @endif
                  @endforeach

                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="value" class="col-sm-3 text-left control-label col-form-label">Nilai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value"
                  placeholder="Masukkan Nilai Matriks" value="{{ old('value', $matrix->value) }}">
                @error('value')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <a href="/matrices" class="btn btn-danger"><i class="mdi mdi-arrow-left-bold"></i> Kembali</a>
              <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save-all"></i> Perbarui</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection