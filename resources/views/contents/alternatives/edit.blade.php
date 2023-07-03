@extends('layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Edit Alternatif</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/alternatives">Alternatif</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Alternatif</li>
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
        <form action="/alternatives/{{ $alternative->id }}" method="POST" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card-body">
            <h4 class="card-title mb-3">Edit Alternatif</h4>
            <div class="form-group row">
              <label for="code" class="col-sm-3 text-left control-label col-form-label">Kode</label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                  placeholder="Masukkan Kode Alternatif" value="{{ old('code', $alternative->code) }}">
                @error('code')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-3 text-left control-label col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  placeholder="Masukkan Nama Alternatif" value="{{ old('name', $alternative->name) }}">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <a href="/alternatives" class="btn btn-danger"><i class="mdi mdi-arrow-left-bold"></i> Kembali</a>
              <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save-all"></i> Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection