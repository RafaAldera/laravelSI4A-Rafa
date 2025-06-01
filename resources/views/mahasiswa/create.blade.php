@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Program Studi</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{route('mahasiswa.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm" value="{{ old('npm') }}">
                        @error('npm')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <input type = "radio" name="jk" value="L" {{ old('jk') == 'L' ? 'checked' : ''}}> Laki-laki
                        <input type = "radio" name="jk" value="P" {{ old('jk') == 'P' ? 'checked' : ''}}> Perempuan
                        @error('jk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">tanggal lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="asal_sma" class="form-label">Asal Sma</label>
                        <input type="text" class="form-control" name="asal_sma" value="{{ old('asal_sma') }}">
                        @error('asal_sma')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                       <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select class="form-control" name="prodi_id" >
                        @foreach($prodi as $item)
                        <option value ="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                        </select>
                        @error('prodi_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                        @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
        </div>
    </div>
    <!--end::Row-->

@endsection